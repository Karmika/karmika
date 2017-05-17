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
use frontend\models\Services;

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
	        $NewUser = new User();
	        $NewUser->username = $user['2'];
	        $NewUser->email = $user['3'];
	        //$NewUser->mobile = $this->mobile;
	        $NewUser->setPassword($user['4']);
	        $NewUser->generateAuthKey();
	        $NewUser->status = User::STATUS_ACTIVE;
            if($NewUser->save())
                Services::ExecuteSQL("INSERT INTO auth_assignment (item_name, user_id, created_at) VALUES ('admin', '".$NewUser->id."', NOW())");
        }
        return true;
    }
}