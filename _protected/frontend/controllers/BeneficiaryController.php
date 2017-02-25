<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use frontend\models\BeneficiaryMaster;
use frontend\models\Publication;
use common\models\User;
use frontend\models\Services;

/**
 * BeneficiaryController implements the CRUD actions for Article model.
 */
class BeneficiaryController extends FrontendController
{
    public $LoggedInUser;
    public $AppliedStatus = "APPLIED";
    public $ApproveStatus = "APPROVED";
    public $RejectedStatus = "REJECTED";

	public function beforeAction($action) {
	    $this->enableCsrfValidation = false;
        if(Yii::$app->user->isGuest) $this->LoggedInUser = 0;
        else $this->LoggedInUser = (string)Yii::$app->user->identity->id;
	    return parent::beforeAction($action);
	}
    public function actionIndex()
    {
        return $this->render('index');
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
        $data["benf_application_status"] = $this->AppliedStatus;
        $data['benf_acknowledgement_number'] = Services::GetNewBeneficiaryAcknowledgementNumber();
        $model->attributes = $data;
        //print_r($model->validate());echo "<br>";
        //echo "<pre>";print_r($model->getErrors());exit;
        //print_r($model->save());exit;
        if($model->save()) return json_encode(array("status"=>"success","id"=>$data['benf_acknowledgement_number']));
        return json_encode(array("status"=>"failed"));
    }
 
    public function actionGetbeneficiary()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $result = array();

        if(isset($data['id']) && $data['id'] != ""){
            $beneficiary_details = BeneficiaryMaster::find()
            ->where(['id' => $data['id']])
            ->one();
            $result = ArrayHelper::toArray($beneficiary_details,'*');
            $result['actionRequired'] = ($result['benf_application_status'] == $this->AppliedStatus)?true:false;
        }
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
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $model->attributes = $data;
        if($model->update()) return "success";
        return "failed";
    }

    public function actionAllbeneficiaries()
    {
        $beneficiary_details = BeneficiaryMaster::find()
        ->select(['id','benf_first_name', 'benf_last_name','benf_mobile_no','benf_date_of_birth','benf_sex','benf_martial_status','updated_by_user_id','benf_acknowledgement_number','benf_application_status'])
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
        }
        return json_encode($result);
        $result = array(0=>array("full_name"=>"Sravan Kumar","benf_mobile_no"=>"8892233720","benf_date_of_birth"=>"27/07/1991",
            "benf_sex"=>"Male","benf_martial_status"=>"Single","updated_by"=>"Superadmin"));
        return json_encode($result);
    } 
}
