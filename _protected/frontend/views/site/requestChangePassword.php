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

    <form name="mobileNumberForm" role="form" novalidate>
        <div ng-if="step1" class="row">
            <h2><?= Html::encode($this->title) ?></h2>
            <br>
                <p>A OTP will be sent to below mobile to reset password.</p>
            
            <div class="col-xs-5 well bs-component">
                <label for="ex2">Mobile : </label>
                <input class="form-control" ng-model="PasswordReset.mob" name="mob" required type="number" pattern="[1-9]{1}[0-9]{9}" />
                <small class="error" ng-show="mobileNumberForm.mob.$invalid && mobileNumberForm.mob.$dirty">Please enter valid mobile number</small>
                <small class="error" ng-if="ServerVaidationErrorForMobile">Mobile number not linked to any account</small>
                <br>
                <button ng-disabled="mobileNumberForm.$invalid" type="button" class="btn btn-default pull-right" ng-click="GenerateOTP()">Next</button>
            </div>
        </div>
    </form>

    <form name="OTPForm" role="form" novalidate>

        <div ng-if="step2" class="row">
            <h2>Enter OTP to reset password</h2>
            <br>        
            <div class="col-xs-5 well bs-component">
                <div class=" col-xs-9">
                    <input class="form-control" ng-model="PasswordReset.otp" name="otp" required type="number" pattern="[1-9]{1}[0-9]{5}" />
                    <small class="error" ng-show="(OTPForm.otp.$invalid && OTPForm.otp.$dirty) || ServerVaidationErrorForOTP">Please enter valid OTP</small>
                </div>
                <div class=" col-xs-3"><button ng-disabled="OTPForm.$invalid" type="button" class="btn btn-default" ng-click="VerifyOTP()">Verify</button></div>
            </div>
        </div>
    </form>

    <form name="passwordForm" role="form" novalidate>
        <div ng-if="step3" class="row">
            <h2>Enter New password</h2>
            <br>        
            <div class="col-xs-5 well bs-component">
                <div class=" col-xs-9">
                    <input class="form-control" ng-model="PasswordReset.new_password" name="new_password" ng-minlength="6" type="text" required />
                    <small class="error" ng-show="passwordForm.new_password.$invalid && passwordForm.new_password.$dirty">Password should have min 6 characters/numbers</small>
                </div>
                <div class=" col-xs-3"><button type="button" ng-disabled="passwordForm.$invalid" class="btn btn-default" ng-click="SavePassword()">Save</button></div>
            </div>
        </div>
    </form>
</div>
