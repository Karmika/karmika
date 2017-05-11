<?php
namespace frontend\controllers;

use yii\rest\ActiveController;

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
        $users = $_POST;
        return $users;
    }
}