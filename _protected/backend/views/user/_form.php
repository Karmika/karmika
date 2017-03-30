<?php
use common\rbac\models\AuthItem;
use frontend\models\Locations;
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $role common\rbac\models\Role; */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-user']); ?>

        <?= $form->field($user, 'username') ?>
        
        <?= $form->field($user, 'email') ?>

        <?php if ($user->scenario === 'create'): ?>
            <?= $form->field($user, 'password')->widget(PasswordInput::classname(), []) ?>
        <?php else: ?>
            <?= $form->field($user, 'password')->widget(PasswordInput::classname(), [])
                     ->passwordInput(['placeholder' => Yii::t('app', 'New pwd ( if you want to change it )')]) 
            ?>       
        <?php endif ?>

    <div class="row">
    <div class="col-lg-6">

        <?= $form->field($user, 'status')->dropDownList($user->statusList) ?>

        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
        <?= $form->field($role, 'item_name')->dropDownList($roles) ?>
<?php 
        $locations = Locations::find()
        ->select(['id','parent_location_id', 'location'])
        ->where(['parent_location_id' => null])
        ->orderBy(['location' => SORT_ASC])
        ->all();
        $locations = ArrayHelper::toArray($locations,'*');
        $finalList = array();
        foreach ($locations as $key => $value) {
            $subLocations = Locations::find()
                        ->select(['location'])
                        ->where(['parent_location_id' => $value['id']])
                        ->orderBy(['location' => SORT_ASC])
                        ->all();
            $subLocations = ArrayHelper::toArray($subLocations,'*');
            $FinalSubList = array();
            foreach ($subLocations as $key => $value2) {
                $FinalSubList[$value2["location"]] = $value2["location"];
            }
            $finalList[$value['location']] = $FinalSubList;
        }
?>
        <?= $form->field($user, 'location')->ListBox($finalList, array('multiple' => 'multiple')); ?> 

    </div>
    </div>

    <div class="form-group">     
        <?= Html::submitButton($user->isNewRecord ? Yii::t('app', 'Create') 
            : Yii::t('app', 'Update'), ['class' => $user->isNewRecord 
            ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', 'Cancel'), ['user/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
