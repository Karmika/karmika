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
    public function actionAllpayments()
    {
        $post = file_get_contents("php://input");
        $data = json_decode($post, true);
        $model = BeneficiaryMaster::findOne(13);
        return json_encode(array('full_name' => $model->benf_first_name." ".$model->benf_last_name, 
                                             'registration_no' => $model->benf_registration_number, 'payments'=>[]));
    }
}
