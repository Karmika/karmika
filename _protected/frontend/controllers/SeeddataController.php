<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use frontend\models\LoginForm;
use frontend\models\Services;
use frontend\models\SelectionSeedData;

class SeeddataController extends FrontendController
{    
    public $LoggedInUser;
    public $LoggedInUserRole;
    public $IsAdmin;
    public $AdminRole = "admin";
    public $TheCreatorRole = "theCreator";
    public $MemberRole = "member";
    public $SubAdminRole = "subAdmin";
    public $PaymentStatusEntityTypeKey = "payment_status";
    public $PaymentStatusReceivedId = 1;

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        if(Yii::$app->user->isGuest) $this->LoggedInUser = 0;
        else $this->LoggedInUser = (string)Yii::$app->user->identity->id;

        $userDetails = Yii::$app->authManager->getRolesByUser($this->LoggedInUser);
        if(isset($userDetails[$this->TheCreatorRole])) $this->LoggedInUserRole = $this->TheCreatorRole;
        else if(isset($userDetails[$this->AdminRole])) $this->LoggedInUserRole = $this->AdminRole;
        else if(isset($userDetails[$this->MemberRole])) $this->LoggedInUserRole = $this->MemberRole;
        else if(isset($userDetails[$this->SubAdminRole])) $this->LoggedInUserRole = $this->SubAdminRole;
        else $this->LoggedInUserRole = "";

        $this->IsAdmin = ($this->LoggedInUserRole == $this->AdminRole || $this->LoggedInUserRole == $this->TheCreatorRole)?1:0;

        return parent::beforeAction($action);
    }
    public function actionGetdata()
    {
        $post = file_get_contents("php://input");
        $post_data = json_decode($post, true);
        $conditions = ['entity_type' => $post_data['type']];
        if(!$this->IsAdmin && $post_data['type'] == $this->PaymentStatusEntityTypeKey){
            $conditions = ['and',['entity_type' => $post_data['type']],['not in','entity_id',[$this->PaymentStatusReceivedId]]];
        }
        $seed_data = SelectionSeedData::find()
        ->select(['entity_id', 'entity_value'])
        ->where($conditions)
        ->all();
        $result = ArrayHelper::map($seed_data, 'entity_id', 'entity_value');
        return json_encode(Services::CustomFormatArray($result));
    }   
}
