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
use frontend\models\BenfPayments;
use frontend\models\Subscriptions;
use common\models\User;
use frontend\models\Services;

/**
 * PaymentController implements the CRUD actions for Article model.
 */
class PaymentController extends FrontendController
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
    public $SubAdminRole = "subAdmin";
    public $SubscriptionFeeTypeId = 1;
    public $PaymentStatusReceivedId = 1;

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
	    return parent::beforeAction($action);
	}

    public function actionIndex()
    {
        return $this->render('index',array('IsAdmin' => $this->IsAdmin));
    }

    public function actionAllpayments()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $Conditions = ["benf_master_id"=>$data["id"]];    
        $payments = BenfPayments::find()
        ->where($Conditions)
        ->select(['id','amount', 'payment_date','payment_reference_id','payment_for','payment_status','payment_mode'])
        ->orderBy(['id' => SORT_DESC])
        ->all();
        $result = ArrayHelper::toArray($payments,'*');
        $result = $this->FormatPayments($result);
        $model = BeneficiaryMaster::findOne($data['id']);
        return json_encode(array("payments"=>$result,"full_name"=>$model->benf_first_name." ".$model->benf_last_name,"registration_no"=>($model->benf_registration_number != null)?$model->benf_registration_number:""));
    }

    public function actionCreate()
    {
        return $this->render('create',array('IsAdmin' => $this->IsAdmin));
    }

    public function actionCreatepayment(){        
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = new BenfPayments();
        $data["created_by_user_id"] = $this->LoggedInUser;
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $model->attributes = $data;
        //print_r($model->validate());echo "<br>";
        //echo "<pre>";print_r($model->getErrors());exit;
        //print_r($model->save());exit;
        if($model->save()) return json_encode(array("status"=>"success","id"=>$model->id));
        return json_encode(array("status"=>"failed"));
    }

    public function actionUpdatepayment()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = BenfPayments::findOne($data['id']);
        $data["updated_by_user_id"] = $this->LoggedInUser;
        $data["updated_date"] = date('Y-m-d H:i:s');
        if($data['payment_for'] == $this->SubscriptionFeeTypeId && $data['payment_status'] == $this->PaymentStatusReceivedId) $this->CreateSubscrciptions($model);
        $model->attributes = $data;
        if($model->update()) return json_encode(array("status"=>"success"));
        return json_encode(array("status"=>"failed"));
    }

    public function actionGetpayment()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $result = Services::GetPaymentByBeneficiaryOrPaymentId($data['id'],'id');
        return json_encode(array("Payment"=>$result));
    }

    private function FormatPayments($result){
        foreach ($result as $key => $payment) {
            $result[$key]['Editable'] = ($result[$key]['payment_status'] == 2)?true:false;
            $payment_for = Services::getObjectForSelectBox($payment['payment_for'],'payment_for');
            if(isset($payment_for['entity_value'])) $result[$key]["payment_for"] = $payment_for['entity_value'];
            $payment_status = Services::getObjectForSelectBox($payment['payment_status'],'payment_status');
            if(isset($payment_status['entity_value'])) $result[$key]["payment_status"] = $payment_status['entity_value'];
            $payment_mode = Services::getObjectForSelectBox($payment['payment_mode'],'payment_mode');
            if(isset($payment_mode['entity_value'])) $result[$key]["payment_mode"] = $payment_mode['entity_value'];
        }
        return $result;
    }

    private function CreateSubscrciptions($payment){
        $bnf = BeneficiaryMaster::findOne($payment['benf_master_id']);
        $totalPaid = $payment['amount'];
        $baseCost = 50;
        $start_date = $bnf['approved_or_rejected_date'];
        $start_date = date('Y-m-d', strtotime($start_date));

        for($i=1;$totalPaid >= ($baseCost*$i);$i++){
            $data = array();
            $model = new Subscriptions();
            $data["benf_master_id"] = $payment['benf_master_id'];
            $data["payment_id"] = $payment['id'];
            $start_date = date('Y-m-d', strtotime($start_date. '+1 days'));
            $data["start_date"] = $start_date;
            $start_date = date('Y-m-d', strtotime($start_date. '+1 years'));
            $start_date = date('Y-m-d', strtotime($start_date. '-1 days'));
            $data["end_date"] = $start_date;
            $data["created_date"] = date('Y-m-d H:i:s');
            $data["updated_date"] = date('Y-m-d H:i:s');
            $data["created_by_user_id"] = $this->LoggedInUser;
            $data["updated_by_user_id"] = $this->LoggedInUser;
            $model->attributes = $data;
            $model->save();
        }
        return true;
    }
}
