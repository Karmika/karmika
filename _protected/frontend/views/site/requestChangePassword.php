<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = Yii::t('app', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div ng-cloak ng-controller="PasswordController" class="container site-request-password-reset">

    <form class="form-vertical" name="passwordReset" role="form" novalidate>
        <div ng-if="step1" class="row">
            <h2><?= Html::encode($this->title) ?></h2>
            <br>
                <p>A OTP will be sent to below mobile to reset password.</p>
            
            <div class="col-xs-5 well bs-component">
                <label for="ex2">Mobile : </label>
                <input class="form-control" ng-model="PasswordReset.mob" name="mob" type="number" />
                <br>
                <button type="button" class="btn btn-default pull-right" ng-click="GenerateOTP()">Next</button>
            </div>
        </div>

        <div ng-if="step2" class="row">
            <h2>Enter OTP to reset password</h2>
            <br>        
            <div class="col-xs-5 well bs-component">
                <div class=" col-xs-9"><input class="form-control" ng-model="PasswordReset.otp" type="text" /></div>
                <div class=" col-xs-3"><button type="button" class="btn btn-default" ng-click="VerifyOTP()">Verify</button></div>
            </div>
        </div>

        <div ng-if="step3" class="row">
            <h2>Enter New password</h2>
            <br>        
            <div class="col-xs-5 well bs-component">
                <div class=" col-xs-9"><input class="form-control" ng-model="PasswordReset.new_password" type="text" /></div>
                <div class=" col-xs-3"><button type="button" class="btn btn-default" ng-click="SavePassword()">Save</button></div>
            </div>
        </div>
    </form>
</div>
