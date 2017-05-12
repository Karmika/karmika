<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use common\models\User;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionSaveuser(){

        $post = file_get_contents("php://input");
        $users = json_decode($post, true);
        foreach ($users as $key => $user) {
        	$user_exists = User::findByUsername($user['2']);
        	if(!empty($user_exists) || $user_exists != null) continue;
			$model = new User();
			$model->attributes = array('username' => $user['2'],'status' => 10,'email' => $user['3'],'password' => $user['4']);
			$model->save();
	        $userUpdate = User::findOne($model->id);
	        $userUpdate->password_hash = Yii::$app->security->generatePasswordHash($user['4']);
	        $userUpdate->update();
        }
        return true;;
    }
}