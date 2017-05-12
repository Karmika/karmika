<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-lg-5 well bs-component">

        <p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?php //-- use email or username field depending on model scenario --// ?>
        <?php if ($model->scenario === 'lwe'): ?>
            <?= $form->field($model, 'email') ?>        
        <?php else: ?>
            <?= $form->field($model, 'username') ?>
        <?php endif ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            <?= Yii::t('app', 'If you forgot your password you can') ?>
            <?= Html::a(Yii::t('app', 'reset it'), ['site/request-change-password']) ?>.
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="col-lg-6 col-lg-offset-1 well bs-component" style="border:1px dotted black;">
        <div class="col-md-12">
            <p style="font-size: 2rem;">Instrcutions for using this application</p>
            <br><b>Step 1:</b> Enter all mandatory information in Registration Details and Nominee Details.
            <br><b>Step 2:</b> Have a pre-view and then submit.
            <br><b>Step 3:</b> Take the print of Application and Nomination Form.
            <br><b>Step 4:</b> Sign the Application and Nominee Forms. Send to the Registering Authority concerned through post or by hand.

            <br>
            <br>
            <p>Use your Application Reference No. for future correspondence or knowing the status of your application.</p>
        </div>
    </div>
</div>
