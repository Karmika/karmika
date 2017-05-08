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
use frontend\models\BenfEmpCertificate;
use frontend\models\BenfPayments;
use frontend\models\Subscriptions;
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
    public $IsSubAdmin;
    public $IsMember;
    public $DraftStatus = "DRAFT";
    public $AppliedStatus = "APPLIED";
    public $AcceptedStatus = "ACCEPTED";
    public $ApproveStatus = "APPROVED";
    public $RejectedStatus = "REJECTED";
    public $AdminRole = "admin";
    public $TheCreatorRole = "theCreator";
    public $MemberRole = "member";
    public $SubAdminRole = "subAdmin";
    public $RegistrationFeeTypeId = 2;
    public $SubscriptionFeeTypeId = 1;

	public function beforeAction($action) {
        date_default_timezone_set("Asia/Kolkata");
	    $this->enableCsrfValidation = false;
        if(Yii::$app->user->isGuest) $this->LoggedInUser = 0;
        else $this->LoggedInUser = (string)Yii::$app->user->identity->id;

        $userDetails = Yii::$app->authManager->getRolesByUser($this->LoggedInUser);
        if(isset($userDetails[$this->TheCreatorRole])) $this->LoggedInUserRole = $this->TheCreatorRole;
        else if(isset($userDetails[$this->AdminRole])) $this->LoggedInUserRole = $this->AdminRole;
        else if(isset($userDetails[$this->MemberRole])) $this->LoggedInUserRole = $this->MemberRole;
        else if(isset($userDetails[$this->SubAdminRole])) $this->LoggedInUserRole = $this->SubAdminRole;
        else $this->LoggedInUserRole = "";

        $this->UserIdentity = Yii::$app->user->identity;
        $this->IsAdmin = ($this->LoggedInUserRole == $this->AdminRole || $this->LoggedInUserRole == $this->TheCreatorRole)?1:0;
	    $this->IsSubAdmin = ($this->LoggedInUserRole == $this->SubAdminRole)?1:0;
        $this->IsMember = ($this->LoggedInUserRole == $this->MemberRole)?1:0;
        return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        return $this->render('index',array('IsAdmin' => $this->IsAdmin,'IsSubAdmin' => $this->IsSubAdmin,'IsMember' => $this->IsMember));
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
    public function actionAckprint()
    {
        return $this->render('ackprint');
    }
    public function actionSubscriptions()
    {
        return $this->render('subscriptions');
    }
    public function actionCreatebeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = new BeneficiaryMaster();
        $data["created_by_user_id"] = $this->LoggedInUser;
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["benf_application_status"] = $this->DraftStatus;
        $data["benf_acknowledgement_number"] = NULL;
        $data["benf_registration_number"] = NULL;
        $model->attributes = $data;
        //print_r($model->validate());echo "<br>";
        //echo "<pre>";print_r($model->getErrors());exit;
        //print_r($model->save());exit;
        if($model->save()) return json_encode(array("status"=>"success","id"=>$model->id));
        return json_encode(array("status"=>"failed"));
    }

    public function actionSubmitbeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne($data['id']);
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["benf_application_status"] = $this->AppliedStatus;
        $data["applied_date"] = date('Y-m-d H:i:s');
        $data['benf_application_number'] = Services::GetNewBeneficiaryApplicationNumber();
        $model->attributes = $data;
        if($model->update()) return json_encode(array("status"=>"success","anumber"=>$data['benf_application_number']));
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

    public function actionAppliedbeneficiary()
    {
        $post = file_get_contents("php://input");
        $response = $this->UpdateBeneficiaryStatus($post,$this->AcceptedStatus);
        if($response["status"] == "success") return json_encode(array("status"=>"success","newStatus"=>$this->AcceptedStatus,"anumber"=>$response["data"]["benf_acknowledgement_number"]));
        else return $response;
    }

    public function actionApprovebeneficiary()
    {
        $post = file_get_contents("php://input");
        $response = $this->UpdateBeneficiaryStatus($post,$this->ApproveStatus);
        if($response["status"] == "success"){
            $this->MarkPayemntAsReceived(json_decode($post, true));
            return json_encode(array("status"=>"success"));
        }
        else return json_encode($response);
    }

    public function actionRejectbeneficiary()
    {
        $post = file_get_contents("php://input");
        $response = $this->UpdateBeneficiaryStatus($post,$this->RejectedStatus);
        if($response["status"] == "success") return json_encode(array("status"=>"success"));
        else return json_encode($response);
    }
    private function UpdateBeneficiaryStatus($post,$status){
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne($data['id']);
        $data["benf_application_status"] = $status;
        if($this->AcceptedStatus == $status){
            $data["accepted_date"] = date('Y-m-d H:i:s');
            $data['benf_acknowledgement_number'] = Services::GetNewBeneficiaryAcknowledgementNumber();
        }else{
            $data["approved_or_rejected_date"] = date('Y-m-d H:i:s');
            if($status == $this->ApproveStatus) $data['benf_registration_number'] = Services::GetNewBeneficiaryRegistrationNumber();
        }
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $model->attributes = $data;
        if($model->update()) return array("status"=>"success","data"=>$data);
        return array("status"=>"failed");
    }

    public function actionAllbeneficiaries()
    {
        $Conditions = ['id' => ""];
        switch ($this->LoggedInUserRole) {
            case $this->TheCreatorRole:
                 $Conditions = ['not in','benf_application_status',array($this->DraftStatus)];
                 break;
            case $this->AdminRole || $this->SubAdminRole:
                 $locations = $this->GetUserLocations();
                 $Conditions = ['and',['in','benf_local_address_taluk',$locations],['not in','benf_application_status',array($this->DraftStatus)]];
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
        $Certificates = $this->GetCertificatesByBeneficiaryId($id);
        $Payment = Services::GetPaymentByBeneficiaryOrPaymentId($id,'benf_master_id');
        return json_encode(array("Beneficiary"=>$Beneficiary,"NomineeList"=>$NomineeList,"DependentsList"=>$DependentsList,"Certificates"=>$Certificates,"Payment"=>$Payment));
    }

    public function actionCreatecertificates()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        foreach ($data['Forms'] as $key=>$certificate){
            $model = new BenfEmpCertificate();
            if(isset($certificate['id']) && $certificate['id'] != null) $model = BenfEmpCertificate::findOne($certificate['id']);

            $certificate["benf_master_id"] = $data['benf_master_id'];
            $certificate["last_updated_by_user_id"] = $this->LoggedInUser;
            $model->attributes = $certificate;
            
            if(isset($certificate['id']) && $certificate['id'] != null){
              $model->update();
              continue;   
            }

            $model->save();
            $data['Forms'][$key]['id'] = $model->id;
            $data['Forms'][$key]['benf_work_end_date'] = $model->benf_work_end_date;
            $data['Forms'][$key]['benf_work_start_date'] = $model->benf_work_start_date;
        }

        return json_encode(array("status"=>"success","Forms"=>$data['Forms']));
    }

    public function actionDeletecertificate(){
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $response = array("status"=>"failed");
        if(isset($data['id']) && $data['id'] != null){
            $model = BenfEmpCertificate::findOne($data['id']);
            $model->delete();
            $response = array("status"=>"success");
        }
        return json_encode($response);
    }

    public function actionAckprintdata(){
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $id = $data['id'];
        $result = array();
        if(isset($id) && $id != ""){
            $beneficiary = BeneficiaryMaster::find()
            ->where(['id' => $id ])
            ->select(['benf_acknowledgement_number','benf_first_name', 'benf_last_name','applied_date','benf_identity_card_number','benf_prmt_address_line1','benf_prmt_address_line2','benf_prmt_address_taluk','benf_prmt_address_district','benf_prmt_address_state','benf_prmt_address_pincode'])
            ->one();
            $beneficiary = ArrayHelper::toArray($beneficiary,'*');
            $result['acknowledgement_number'] = $beneficiary['benf_acknowledgement_number'];
            $result['applicant_name'] = $beneficiary['benf_first_name']." ".$beneficiary['benf_last_name'];
            $result['applicant_address'] = $beneficiary['benf_prmt_address_line1'].", ".$beneficiary['benf_prmt_address_line2'].", ".$beneficiary['benf_prmt_address_taluk'].", ".$beneficiary['benf_prmt_address_district'].", ".$beneficiary['benf_prmt_address_state'].", ".$beneficiary['benf_prmt_address_pincode'];
            $result['identity_card_number'] = $beneficiary['benf_identity_card_number'];
            $result['date_of_application'] = $beneficiary['applied_date'];
            $result['received_application_name'] = $result['applicant_name'];
            $result['registration_fee'] = Services::getRegistrationFee($id);
            $result['subscription_fee'] = Services::getSubscriptionFee($id);
            $result['contact_ro_by_date'] = date('Y-m-d', strtotime($result['date_of_application']. ' + 10 days'));
            $result['office_contact_no'] = 9876543210;
        }
        return json_encode($result);
    }

    public function actionAllsubscriptions(){
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $subscriptions = Subscriptions::find()
        ->select(['start_date','end_date','updated_by_user_id','payment_id'])
        ->all();
        $subscriptions = ArrayHelper::toArray($subscriptions,'*');
        foreach ($subscriptions as $key => $value) {
            $user = User::find()
            ->where(['id' => (int)$value["updated_by_user_id"]])
            ->one();
            $user = ArrayHelper::toArray($user,'*');
            $subscriptions[$key]['updated_by'] = $user["username"];
            $subscriptions[$key]['amountPaid'] = 50;
        }
        $model = BeneficiaryMaster::findOne($data['id']);
        return json_encode(array("subscriptions"=>$subscriptions,"full_name"=>$model->benf_first_name." ".$model->benf_last_name,"registration_no"=>($model->benf_registration_number != null)?$model->benf_registration_number:""));
    }

    public function actionResetpassword(){
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $user = User::findOne(3);
        $user->password_hash = Yii::$app->security->generatePasswordHash($data['pass']);
        if($user->update()) return "success";
        else return "failed";
    }

    private function GetBeneficiaryDetails($Conditions){
        $OrWhereConditions = ['created_by_user_id' => $this->LoggedInUser];
        if(empty($Conditions)) $OrWhereConditions = $Conditions;

        $beneficiary_details = BeneficiaryMaster::find()
        ->where($Conditions)
        ->orWhere($OrWhereConditions)
        ->select(['id','benf_first_name', 'benf_last_name','benf_mobile_no','benf_date_of_birth','benf_sex','benf_martial_status','created_by_user_id','benf_acknowledgement_number','benf_application_status','benf_registration_number','benf_application_number','benf_local_address_taluk'])
        ->orderBy(['id' => SORT_DESC])
        ->all();
        $sno = 1;
        $result = ArrayHelper::toArray($beneficiary_details,'*');

        foreach ($result as $key=>$val)
        {            
            $user = User::find()
            ->where(['id' => (int)$val["created_by_user_id"]])
            ->one();
            $user = ArrayHelper::toArray($user,'*');
            $result[$key]["created_by"] = $user["username"];
            $result[$key]['sno'] = $sno++;
            $result[$key]['full_name'] = $result[$key]['benf_first_name']." ".$result[$key]['benf_last_name'];
            $result[$key]['actionRequired'] = ($result[$key]['benf_application_status'] == $this->AcceptedStatus)?true:false;
            $result[$key]['Editable'] = ($result[$key]['benf_application_status'] == $this->DraftStatus)?true:false;
            $result[$key]['CanConfirm'] = ($result[$key]['benf_application_status'] == $this->AppliedStatus)?true:false;
            $result[$key]['Approved'] = ($result[$key]['benf_application_status'] == $this->ApproveStatus)?true:false;
            if($this->AdminRole || $this->SubAdminRole){
                 $locations = $this->GetUserLocations();
                 if(!in_array($val["benf_local_address_taluk"], $locations)) {
                    $result[$key]['CanConfirm'] = false;
                    $result[$key]['actionRequired'] = false;
                 }
            }
        }
        return $result;
    }

    private function GetBeneficiaryById($id){
        $beneficiary_details = BeneficiaryMaster::find()
            ->where(['id' => $id])
            ->one();
        $result = ArrayHelper::toArray($beneficiary_details,'*');
        $result['actionRequired'] = ($result['benf_application_status'] == $this->AcceptedStatus)?true:false;
        return $result;
    }

    private function GetCertificatesByBeneficiaryId($id){
        $details = BenfEmpCertificate::find()
            ->where(['benf_master_id' => $id])
            ->all();
        $result = ArrayHelper::toArray($details,'*');
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

    private function MarkPayemntAsReceived($data){
        $model = BenfPayments::find()
            ->where(['benf_master_id' => $data['id']])
            ->one();
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["updated_date"] = date('Y-m-d H:i:s');
        $data["payment_status"] = 1;
        $model->attributes = $data;
        if($model->update()) return array("status"=>"success");
        return array("status"=>"failed");
    }

    private function GetUserLocations(){
        return ($this->UserIdentity->location != null && $this->UserIdentity->location != "")?explode(',', $this->UserIdentity->location):[];
    }
}
