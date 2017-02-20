<?php
    $this->title = 'Update Beneficiary';
?>
<div class="BeneficiaryCtrl" ng-cloak ng-controller="BeneficiaryUpdateController">
<h3 align="center">Update Beneficiary</h3>
<br />
<br />
<form class="form-horizontal" name="BeneficiaryFormUpdate" role="form" novalidate>
  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_first_name"><span class="mandatory-field">*&nbsp;</span>First Name :</label>
    <div class="col-sm-10">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="BeneficiaryUpdate.benf_first_name" name="benf_first_name" placeholder="Enter first name" required />
      <small class="error" ng-show="BeneficiaryFormUpdate.benf_first_name.$invalid && BeneficiaryFormUpdate.benf_first_name.$dirty">Please provide first name</small>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_last_name"><span class="mandatory-field">*&nbsp;</span>Last Name :</label>
    <div class="col-sm-10">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="BeneficiaryUpdate.benf_last_name" name="benf_last_name" placeholder="Enter last name" required />
      <small class="error" ng-show="BeneficiaryFormUpdate.benf_last_name.$invalid && BeneficiaryFormUpdate.benf_last_name.$dirty">Please provide last name</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Gender :</label>
    <div class="col-sm-10 radioButtons">
      <label ng-repeat="item in genders">
        <input required type="radio" name="benf_sex" ng-model="BeneficiaryUpdate.benf_sex" value="{{item.entity_id}}" />
        {{item.entity_value}} &nbsp;&nbsp;
      </label>
      <small class="error" ng-show="BeneficiaryFormUpdate.benf_sex.$invalid && BeneficiaryFormUpdate.benf_sex.$dirty">Please select gender</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_date_of_birth"><span class="mandatory-field">*&nbsp;</span>Date Of Birth :</label>
    <div class="col-sm-10" ng-controller="DatepickerPopupController">
        <p class="input-group">
          <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="BeneficiaryUpdate.benf_date_of_birth" is-open="popup1.opened" name="benf_date_of_birth" datepicker-options="dateOptions"  close-text="Close" alt-input-formats="altInputFormats" placeholder="Select date of birth" required />
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <small class="error" ng-show="BeneficiaryFormUpdate.benf_date_of_birth.$invalid && BeneficiaryFormUpdate.benf_date_of_birth.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_martial_status"><span class="mandatory-field">*&nbsp;</span>Martial Status :</label>
    <div class="col-sm-10 radioButtons">
      <label ng-repeat="item in martialStatusList">
        <input required type="radio" name="benf_martial_status" ng-model="BeneficiaryUpdate.benf_martial_status" value="{{item.entity_id}}" />
        {{item.entity_value}} &nbsp;&nbsp;
      </label>
      <small class="error" ng-show="BeneficiaryFormUpdate.benf_martial_status.$invalid && BeneficiaryFormUpdate.benf_martial_status.$dirty">Please select gender</small>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="benf_mobile_no"><span class="mandatory-field">*&nbsp;</span>Mobile No :</label>
    <div class="col-sm-10">
      <input digitswithplusandhyphen-only maxlength="15" class="form-control" ng-model="BeneficiaryUpdate.benf_mobile_no" name="benf_mobile_no" placeholder="Enter mobile number" required />
      <small class="error" ng-show="BeneficiaryFormUpdate.benf_mobile_no.$invalid && BeneficiaryFormUpdate.benf_mobile_no.$dirty">Please provide mobile number</small>
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button onclick="" ng-disabled="BeneficiaryFormUpdate.$invalid" type="submit" ng-click="Updatedata()" class="btn btn-success">Update</button>
      <button type="submit" ng-click="Back()" class="btn btn-success">Back</button>
    </div>
  </div>
</form>
</div>
