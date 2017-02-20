<?php

$this->title = Yii::t('app', Yii::$app->name);
?>
<style type="text/css">
b{
    color: green;
}
</style>
<div class="site-index" ng-cloak ng-controller="BeneficiarySuccessController">

    <div class="jumbotron">
        <h1>Congratulations!</h1><br>

        <p class="lead">You have successfully created beneficiary, application no : <b>{{ApplicationReferenceNo}}</b></p>

        <p><a class="btn btn-lg btn-success" href="./">Goto Home</a></p>
    </div>

</div>

