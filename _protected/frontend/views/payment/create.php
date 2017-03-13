<?php
    $this->title = 'Create Payment';
?>
<div class="PaymentCtrl" ng-cloak ng-controller="PaymentController" ng-init="Create()">
<h3 align="center">Create Payment</h3>
<div class="row">
  <span class="pull-right" style="padding:3%;">Full&nbsp;Name : <b>{{full_name}}</b> &nbsp;&nbsp;&nbsp;Registration No : <b>{{registration_no}}</b></span>
</div>

<form class="form-horizontal" name="PaymentCreateForm" role="form" novalidate>

  <div class="form-group">
    <label class="control-label col-sm-2" for="amount"><span class="mandatory-field">*&nbsp;</span>Amount :</label>
    <div class="col-sm-10">
      <input numerics-only class="form-control" ng-model="Payment.amount" name="amount" placeholder="Enter amount" required />
      <small class="error" ng-show="PaymentCreateForm.amount.$invalid && PaymentCreateForm.amount.$dirty">Please provide amount</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="date_of_Payment"><span class="mandatory-field">*&nbsp;</span>Date Of Payment :</label>
    <div class="col-sm-10" ng-controller="DatepickerPopupController">
        <p class="input-group">
          <input date-validation class="form-control" ng-click="open1()" uib-datepicker-popup="{{format}}" ng-model="Payment.date_of_payment" is-open="popup1.opened" name="date_of_payment" datepicker-options="dateOptions"  close-text="Close" alt-input-formats="altInputFormats" placeholder="Select start period" required />
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <small class="error" ng-show="PaymentCreateForm.date_of_payment.$invalid && PaymentCreateForm.date_of_payment.$dirty">Please provide date of payment and only acceptable format is DD-MM-YYYY</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="notes">Remarks :</label>
    <div class="col-sm-10">
      <textarea min="1" max="250" class="form-control" ng-model="Payment.notes" name="notes" placeholder="Enter remarks" ></textarea>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">

      <!-- onclick="this.disabled=true;" -->
      <button  ng-disabled="PaymentCreateForm.$invalid" type="button" ng-click="CreatePayment()" class="btn btn-default">Save</button>
      <button type="button" ng-click="Back()" class="btn btn-default">Back</button>
    </div>
  </div>

</form>
</div>