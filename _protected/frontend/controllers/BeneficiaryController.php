<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use frontend\models\BeneficiaryMaster;
use frontend\models\BenfNominee;
use frontend\models\BenfDependents;
use common\models\User;
use frontend\models\Services;

/**
 * BeneficiaryController implements the CRUD actions for Article model.
 */
class BeneficiaryController extends FrontendController
{
    public $LoggedInUser;
    public $LoggedInUserRole;
    public $UserIdentity;
    public $IsAdmin;
    public $DraftStatus = "DRAFT";
    public $AppliedStatus = "APPLIED";
    public $ApproveStatus = "APPROVED";
    public $RejectedStatus = "REJECTED";
    public $AdminRole = "admin";
    public $TheCreatorRole = "theCreator";
    public $MemberRole = "member";

	public function beforeAction($action) {
	    $this->enableCsrfValidation = false;
        if(Yii::$app->user->isGuest) $this->LoggedInUser = 0;
        else $this->LoggedInUser = (string)Yii::$app->user->identity->id;

        $userDetails = Yii::$app->authManager->getRolesByUser($this->LoggedInUser);
        if(isset($userDetails[$this->TheCreatorRole])) $this->LoggedInUserRole = $this->TheCreatorRole;
        else if(isset($userDetails[$this->AdminRole])) $this->LoggedInUserRole = $this->AdminRole;
        else if(isset($userDetails[$this->MemberRole])) $this->LoggedInUserRole = $this->MemberRole;
        else $this->LoggedInUserRole = "";

        $this->UserIdentity = Yii::$app->user->identity;
        $this->IsAdmin = ($this->LoggedInUserRole == $this->AdminRole || $this->LoggedInUserRole == $this->TheCreatorRole)?1:0;
	    return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        return $this->render('index',array('IsAdmin' => $this->IsAdmin));
    }
    public function actionCreate()
    {
        return $this->render('create');
    }
    public function actionUpdate()
    {
        return $this->render('update');
    }
    public function actionView()
    {
        return $this->render('view');
    }
    public function actionSuccess()
    {
        return $this->render('success');
    }
    public function actionSample()
    {
        return $this->render('sample');
    }
    public function actionCreatebeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = new BeneficiaryMaster();
        $data["created_by_user_id"] = $this->LoggedInUser;
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["benf_application_status"] = $this->DraftStatus;
        $data['benf_acknowledgement_number'] = Services::GetNewBeneficiaryAcknowledgementNumber();
        $model->attributes = $data;
        //print_r($model->validate());echo "<br>";
        //echo "<pre>";print_r($model->getErrors());exit;
        //print_r($model->save());exit;
        if($model->save()) return json_encode(array("status"=>"success","anumber"=>$data['benf_acknowledgement_number'],"id"=>$model->id));
        return json_encode(array("status"=>"failed"));
    }

    public function actionSubmitbeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne($data['id']);
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["benf_application_status"] = $this->AppliedStatus;
        $model->attributes = $data;
        if($model->update()) return json_encode(array("status"=>"success"));
        return json_encode(array("status"=>"failed"));
    }
 
    public function actionGetbeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $result = array();
        if(isset($data['id']) && $data['id'] != "") $result = $this->GetBeneficiaryById($data['id']);
        return json_encode($result);
    }

    public function actionUpdatebeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne($data['id']);
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $model->attributes = $data;
        if($model->update()) return "success";
        return "failed";
    }

    public function actionApprovebeneficiary()
    {
        $post = file_get_contents("php://input");
        return $this->UpdateBeneficiaryStatus($post,$this->ApproveStatus);
    }

    public function actionRejectbeneficiary()
    {
        $post = file_get_contents("php://input");
        return $this->UpdateBeneficiaryStatus($post,$this->RejectedStatus);
    }
    private function UpdateBeneficiaryStatus($post,$status){
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne($data['id']);
        $data["benf_application_status"] = $status;
        $data['benf_registration_number'] = Services::GetNewBeneficiaryRegistrationNumber();
        $data["admin_comments"] = $data['adminComments'];
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $model->attributes = $data;
        if($model->update()) return "success";
        return "failed";
    }

    public function actionAllbeneficiaries()
    {
        $Conditions = ['id' => ""];
        switch ($this->LoggedInUserRole) {
            case $this->TheCreatorRole:
                 $Conditions = [];
                 break;
            case $this->AdminRole:
                 $locations = ($this->UserIdentity->location != null && $this->UserIdentity->location != "")?explode(',', $this->UserIdentity->location):[];
                 $Conditions = ['in','benf_local_address_taluk',$locations];
                 break;
            case $this->MemberRole:
                 $Conditions = ['created_by_user_id' => $this->LoggedInUser];
                 break;
        }
        $result = $this->GetBeneficiaryDetails($Conditions);
        return json_encode($result);
    } 

    public function actionSearchbeneficiaries()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        //$data = array("benf_first_name"=>"Sravan","benf_mobile_no"=>"8892233720");
        $Conditions = [];
        foreach ($data as $key => $value) {
            $Conditions[$key] = $value;
        }
        $result = $this->GetBeneficiaryDetails($Conditions);
        return json_encode($result);
    }

    public function actionCreatenominee()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        foreach ($data['nomineeList'] as $key=>$nominee) {
            $model = new BenfNominee();
            
            if(isset($nominee['id']) && $nominee['id'] != null) $model = BenfNominee::findOne($nominee['id']);
            
            $nominee["benf_master_id"] = $data['id'];
            $nominee["last_updated_by_user_id"] = $this->LoggedInUser;
            $model->attributes = $nominee;
            
            if(isset($nominee['id']) && $nominee['id'] != null){
              $model->update();
              continue;   
            }

            $model->save();
            $data['nomineeList'][$key]['id'] = $model->id;
        }
        return json_encode(array("status"=>"success","nomineeList"=>$data['nomineeList']));
    }

    public function actionCreatedependents()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        foreach ($data['dependentsList'] as $key=>$dependent) {
            $model = new BenfDependents();

            if(isset($dependent['id']) && $dependent['id'] != null) $model = BenfDependents::findOne($dependent['id']);

            $dependent["benf_master_id"] = $data['id'];
            $dependent["last_updated_by_user_id"] = $this->LoggedInUser;
            $model->attributes = $dependent;
            
            if(isset($dependent['id']) && $dependent['id'] != null){
              $model->update();
              continue;   
            }

            $model->save();
            $data['dependentsList'][$key]['id'] = $model->id;
        }
        return json_encode(array("status"=>"success","dependentsList"=>$data['dependentsList']));
    }

    public function actionGetbeneficiaryalldata()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $id = $data['id'];
        $result = array();
        if((!isset($id)) || $id == "") return json_encode($result);        
        $Beneficiary = $this->GetBeneficiaryById($id);
        $NomineeList = $this->GetNomineesByBeneficiaryId($id);
        $DependentsList = $this->GetDependentsByBeneficiaryId($id);
        return json_encode(array("Beneficiary"=>$Beneficiary,"NomineeList"=>$NomineeList,"DependentsList"=>$DependentsList));
    }

    private function GetBeneficiaryDetails($Conditions){

        $beneficiary_details = BeneficiaryMaster::find()
        ->where($Conditions)
        ->select(['id','benf_first_name', 'benf_last_name','benf_mobile_no','benf_date_of_birth','benf_sex','benf_martial_status','updated_by_user_id','benf_acknowledgement_number','benf_application_status','benf_registration_number'])
        ->orderBy(['id' => SORT_DESC])
        ->all();
        $sno = 1;
        $result = ArrayHelper::toArray($beneficiary_details,'*');
        foreach ($result as $key=>$val)
        {            
            $user = User::find()
            ->where(['id' => (int)$val["updated_by_user_id"]])
            ->one();
            $user = ArrayHelper::toArray($user,'*');
            $result[$key]["updated_by"] = $user["username"];
            $result[$key]['sno'] = $sno++;
            $result[$key]['full_name'] = $result[$key]['benf_first_name']." ".$result[$key]['benf_last_name'];
            $result[$key]['actionRequired'] = ($result[$key]['benf_application_status'] == $this->AppliedStatus)?true:false;
            $result[$key]['Editable'] = ($result[$key]['benf_application_status'] == $this->DraftStatus)?true:false;
        }
        return $result;
    }

    private function GetBeneficiaryById($id){
        $beneficiary_details = BeneficiaryMaster::find()
            ->where(['id' => $id])
            ->one();
        $result = ArrayHelper::toArray($beneficiary_details,'*');
        $result['actionRequired'] = ($result['benf_application_status'] == $this->AppliedStatus)?true:false;
        return $result;
    }

    private function GetNomineesByBeneficiaryId($id){
        $details = BenfNominee::find()
            ->where(['benf_master_id' => $id])
            ->all();
        $result = ArrayHelper::toArray($details,'*');
        return $result;
    }

    private function GetDependentsByBeneficiaryId($id){
        $details = BenfDependents::find()
            ->where(['benf_master_id' => $id])
            ->all();
        $result = ArrayHelper::toArray($details,'*');
        return $result;
    }
}
