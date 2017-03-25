<?php
    $this->title = 'Make Payment';
?>

<div class="PaymentCtrl" ng-cloak ng-controller="PaymentController" ng-init="Create()">
<h3 align="center">Subscription and Other Payment</h3>
<div class="row">
  <span class="pull-right" style="padding:3%;">Full&nbsp;Name : <b>{{full_name}}</b> &nbsp;&nbsp;&nbsp;Registration No : <b>{{registration_no}}</b></span>
</div>

<form class="form-horizontal" name="PaymentCreateForm" role="form" novalidate>

  <div class="row form-group">
        <label class="control-label col-sm-2" for="amount"><span class="mandatory-field">*&nbsp;</span>Amount :</label>
        <div class="col-sm-4">
          <input numerics-only class="form-control" ng-model="Payment.amount" name="amount" placeholder="Enter amount" required />
          <small class="error" ng-show="PaymentCreateForm.amount.$invalid && PaymentCreateForm.amount.$dirty">Please provide amount</small>
        </div>

        <label class="control-label col-sm-2" for="payment_for"><span class="mandatory-field">*&nbsp;</span>Payment For :</label>
        <div class="col-sm-4">
          <select required name="payment_for" class="form-control" ng-model="Payment.payment_for" ng-options="for.entity_value for for in paymentFors track by for.entity_id">
            <option value="">Please select payment for </option>
          </select>
          <small class="error" ng-show="PaymentCreateForm.payment_for.$invalid && PaymentCreateForm.payment_for.$dirty">Please provide payment for</small>
        </div>
    </div>

    <div class="row form-group">
        <label class="control-label col-sm-2" for="payment_status"><span class="mandatory-field">*&nbsp;</span>Payment Status :</label>
        <div class="col-sm-4">
          <select required name="payment_status" class="form-control" ng-model="Payment.payment_status" ng-options="status.entity_value for status in paymentStatuses track by status.entity_id">
              <option value="">Please select payment status </option>
          </select>
          <small class="error" ng-show="PaymentCreateForm.payment_status.$invalid && PaymentCreateForm.payment_status.$dirty">Please provide payment status</small>
        </div>
        
        <label class="control-label col-sm-2" for="payment_reference_id">&nbsp;&nbsp;Payment Reference Id :</label>
        <div class="col-sm-4">
          <input numerics-only class="form-control" ng-model="Payment.payment_reference_id" name="payment_reference_id" placeholder="Enter reference details" />
        </div>
    </div>

    <div class="row form-group">
        <label class="control-label col-sm-2" for="payment_date"><span class="mandatory-field">*&nbsp;</span>Payment date :</label>
        <div class="col-sm-4" ng-controller="DatepickerPopupController">
            <p class="input-group">
              <input date-validation ng-click="open1()" class="form-control" uib-datepicker-popup="{{format}}" ng-model="Payment.payment_date" is-open="popup1.opened" name="payment_date" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select payment date" required />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
            <small class="error" ng-show="PaymentCreateForm.payment_date.$invalid && PaymentCreateForm.payment_date.$dirty">Please provide payment date and only acceptable format is DD-MM-YYYY</small>
        </div>

        <label class="control-label col-sm-2" for="payment_mode"><span class="mandatory-field">*&nbsp;</span>Payment Mode :</label>
        <div class="col-sm-4">
          <select required name="payment_mode" class="form-control" ng-model="Payment.payment_mode" ng-options="mode.entity_value for mode in paymentModes track by mode.entity_id">
              <option value="">Please select payment mode </option>
          </select>
          <small class="error" ng-show="PaymentCreateForm.payment_mode.$invalid && PaymentCreateForm.payment_mode.$dirty">Please provide payment mode</small>
        </div>
    </div>

    <div class="row form-group" ng-show="BankAndPaydateFieldShow">
          <label class="control-label col-sm-2" for="chequeordd_no"><span class="mandatory-field">*&nbsp;</span>Cheque / DD No :</label>
          <div class="col-sm-4">
            <input alphanumerics-only class="form-control" ng-model="Payment.chequeordd_no" name="chequeordd_no" placeholder="Enter Cheque / DD No" ng-required="BankAndPaydateFieldShow" />
            <small class="error" ng-show="PaymentCreateForm.chequeordd_no.$invalid && PaymentCreateForm.chequeordd_no.$dirty">Please provide chequeordd no</small>
          </div>
          <label class="control-label col-sm-2" for="bank_name">&nbsp;&nbsp;Bank Name :</label>
          <div class="col-sm-4">
            <input class="form-control" ng-model="Payment.bank_name" name="bank_name" placeholder="Enter bank name" />
          </div>
    </div>
    <div class="row form-group">
        <div ng-show="BankAndPaydateFieldShow">
            <label class="control-label col-sm-2" for="ifsc_code">&nbsp;&nbsp;IFSC Code :</label>
            <div class="col-sm-4">
                <input class="form-control" ng-model="Payment.ifsc_code" name="ifsc_code" placeholder="Enter ifsc code" />
            </div>
        </div>
        <label class="control-label col-sm-2" for="notes">&nbsp;&nbsp;Remarks :</label>
        <div class="col-sm-4">
          <textarea min="1" max="250" class="form-control" ng-model="Payment.notes" name="notes" placeholder="Enter remarks" ></textarea>
        </div>
    </div>


  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10 pull-right">
      <button  ng-disabled="PaymentCreateForm.$invalid" type="button" ng-click="CreatePayment()" class="btn btn-success">Save</button>
      <button type="button" ng-click="Back()" class="btn btn-default">Back</button>
    </div>
  </div>

</form>
</div>