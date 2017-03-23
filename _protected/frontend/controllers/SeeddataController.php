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
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionGetdata()
    {
        $post = file_get_contents("php://input");
        $post_data = json_decode($post, true);
        $seed_data = SelectionSeedData::find()
        ->select(['entity_id', 'entity_value'])
        ->where(['entity_type' => $post_data['type']])
        ->all();
        $result = ArrayHelper::map($seed_data, 'entity_id', 'entity_value');
        return json_encode(Services::CustomFormatArray($result));
    }   
}
