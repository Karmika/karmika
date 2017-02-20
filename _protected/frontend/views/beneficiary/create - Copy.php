<?php
    $this->title = 'Create Beneficiary';
?>
<div class="beneficiaryCtrl" ng-cloak ng-controller="BeneficiaryController">
<h3 align="center">Register Beneficiary</h3>
<br/>
<form class="form-vertical" name="beneficiary" role="form" novalidate>
  <label>Beneficiary Name: ಆರ್ಜಿದಾರರ  ಹೆಸರು </label>
  <div class="row form-group">
    <label class="control-label col-md-1" for="benf_first_name"><span class="mandatory-field">*&nbsp;</span>First&nbsp;Name ಮೊದಲ&nbsp;ಹೆಸರು </label>
    <div class="col-md-3">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_first_name" name="benf_first_name" placeholder="First Name" maxlength="25" required />
      <small class="error" ng-show="beneficiary.benf_first_name.$invalid && beneficiary.benf_first_name.$dirty">Please provide first name</small>
    </div>

    <label class="control-label col-md-1" for="benf_middle_name">Middle&nbsp;Name ಮಧ್ಯ ಹೆಸರು </label>
    <div class="col-md-3">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_middle_name" name="benf_middle_name" placeholder="Middle Name" maxlength="25" />
      <small class="error" ng-show="beneficiary.benf_middle_name.$invalid && beneficiary.benf_middle_name.$dirty">Please provide middle name</small>
    </div>

    <label class="control-label col-md-1" for="benf_last_name">Last&nbsp;Name ಕೊನೆ ಹೆಸರು </label>
    <div class="col-md-3">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_last_name" name="benf_last_name" placeholder="Last Name" maxlength="25" />
      <small class="error" ng-show="beneficiary.benf_last_name.$invalid && beneficiary.benf_last_name.$dirty">Please provide Last name</small>
    </div>
  </div>
  <label>Beneficiary Permanent Address: ಆರ್ಜಿದಾರರ  ವಿಳಾಸ </label>
    <div class="row form-group">
    <label class="control-label col-md-1" for="permanent_address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_line1" name="permanent_address_line1" placeholder="Line 1" maxlength="25" required />
      <small class="error" ng-show="beneficiary.permanent_address_line1.$invalid && beneficiary.permanent_address_line1.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="permanent_address_line2"><span class="mandatory-field">*&nbsp;</span>Line-2</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_line2" name="permanent_address_line2" placeholder="Line 2" maxlength="25" required />
      <small class="error" ng-show="beneficiary.permanent_address_line2.$invalid && beneficiary.permanent_address_line2.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="prmt_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_pincode" name="prmt_pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_prmt_address_pincode, 'permanent')" required />
      <small class="error" ng-show="beneficiary.prmt_pincode.$invalid && beneficiary.prmt_pincode.$dirty">Please provide Pincode</small>
    </div>
    </div>
    <div class="row form-group">
    <label class="control-label col-md-1" for="benf_prmt_address_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_taluk" name="benf_prmt_address_taluk" placeholder="" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="benf_prmt_address_district"><span class="mandatory-field">*&nbsp;</span>District</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_district" name="benf_prmt_address_district" placeholder="" maxlength="25" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="benf_prmt_address_state"><span class="mandatory-field">*&nbsp;</span>State</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_prmt_address_state" name="benf_prmt_address_state" placeholder="" maxlength="25" required readonly="true" />
    </div>
  </div>

  <div class="row form-group">
    <label class="control-label col-md-1" for="benf_mobile_no"><span class="mandatory-field">*&nbsp;</span>Mobile&nbsp;No</label>
    <div class="col-md-3">
      <input digitswithplusandhyphen-only maxlength="13" class="form-control" ng-model="Beneficiary.benf_mobile_no" name="benf_mobile_no" placeholder="Enter mobile number" required />
      <small class="error" ng-show="beneficiary.benf_mobile_no.$invalid && beneficiary.benf_mobile_no.$dirty">Please provide mobile number</small>
    </div>

    <label class="control-label col-md-1" for="benf_date_of_birth">Date&nbsp;of&nbsp;Birth</label>
    <div class="col-md-3" ng-controller="DatepickerPopupController">
        <p class="input-group">
          <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_birth" is-open="popup1.opened" name="benf_date_of_birth" datepicker-options="dateOptions"  close-text="Close" alt-input-formats="altInputFormats" placeholder="Select date of birth" />
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <small class="error" ng-show="beneficiary.benf_date_of_birth.$invalid && beneficiary.benf_date_of_birth.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
    </div>

    <label class="control-label col-md-1" for="benf_age"><span class="mandatory-field">*&nbsp;</span>Age</label>
    <div class="col-md-3" >
          <input class="form-control" ng-model="Beneficiary.beneficiary_age" name="benf_age" placeholder="Age" required readonly="true" />
        <small class="error" ng-show="beneficiary.benf_age.$invalid && beneficiary.benf_age.$dirty">Please provide applicant Age</small>
    </div>
  </div>

  <div class="row form-group">
    <label class="control-label col-md-1" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Sex</label>
    <div class="col-md-3 radioButtons">
      <label ng-repeat="item in genders">
        <input required type="radio" name="benf_sex" ng-model="Beneficiary.benf_sex" value="{{item.entity_id}}" />
        {{item.entity_value}} &nbsp;&nbsp;
      </label>
      <small class="error" ng-show="beneficiary.benf_sex.$invalid && beneficiary.benf_sex.$dirty">Please select sex</small>
    </div>

    <label class="control-label col-md-1" for="nationality"><span class="mandatory-field">*&nbsp;</span>Nationality</label>
    <div class="col-md-3">
      <input letters-only class="form-control" ng-model="Beneficiary.nationality" name="nationality" placeholder="INDIAN" maxlength="25" required />
      <small class="error" ng-show="beneficiary.nationality.$invalid && beneficiary.nationality.$dirty">Please provide nationality</small>
    </div>

    <label class="control-label col-md-1" for="benf_caste"><span class="mandatory-field">*&nbsp;</span>Caste</label>
    <div class="col-md-3">
      <select class="form-control" ng-options="caste.id as caste.value for caste in casteList" ng-model="Beneficiary.benf_caste" name="benf_caste"></select>
      <small class="error" ng-show="beneficiary.benf_caste.$invalid && beneficiary.benf_caste.$dirty">Please select caste</small>
    </div>
  </div>
    <hr>

    <label>Beneficiary Local Address: ಆರ್ಜಿದಾರರ  ಸ್ಥಳೀಯ ವಿಳಾಸ <span><input type="checkbox" ng-change="toggleSameAsPermanentAddress()" ng-model='sameAsPermanentAddress'>Same as Permanent Address</span> </label>
    <div class="row form-group">
    <label class="control-label col-md-1" for="benf_local_address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_address_line1" name="benf_local_address_line1" placeholder="Line 1" maxlength="25" required ng-readonly="sameAsPermanentAddress" />
      <small class="error" ng-show="beneficiary.benf_local_address_line1.$invalid && beneficiary.benf_local_address_line1.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="benf_local_address_line2"><span class="mandatory-field">*&nbsp;</span>Line-2</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_address_line2" name="benf_local_address_line2" placeholder="Line 2" maxlength="25" ng-readonly="sameAsPermanentAddress" required />
      <small class="error" ng-show="beneficiary.benf_local_address_line2.$invalid && beneficiary.benf_local_address_line2.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="benf_local_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_pincode" name="benf_local_pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_local_pincode, 'local')" ng-readonly="sameAsPermanentAddress" required />
      <small class="error" ng-show="beneficiary.benf_local_pincode.$invalid && beneficiary.benf_local_pincode.$dirty">Please provide Pincode</small>
    </div>
    </div>
    <div class="row form-group">
    <label class="control-label col-md-1" for="benf_local_address_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_address_taluk" name="benf_local_address_taluk" placeholder="" maxlength="6" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="benf_local_address_district"><span class="mandatory-field">*&nbsp;</span>District</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_address_district" name="benf_local_address_district" placeholder="" maxlength="25" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="benf_local_address_state"><span class="mandatory-field">*&nbsp;</span>State</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.benf_local_address_state" name="benf_local_address_state" placeholder="" maxlength="25" required readonly="true" />
    </div>
  </div>


  <!-- THE EMPLOYER DETAILS -->
  <br>
  <hr>
  <label class=''>Name and address of Present Employer:</label>
  <div class="row form-group">
    <label class="control-label col-md-1" for="employer_full_name"><span class="mandatory-field">*&nbsp;</span>Employer Name</label>
    <div class="col-md-7">
      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.employer_full_name" name="employer_full_name" placeholder="Employer Full Name" maxlength="40" required />
      <small class="error" ng-show="beneficiary.employer_full_name.$invalid && beneficiary.employer_full_name.$dirty">Please provide employer name</small>
    </div>

    <label class="control-label col-md-1" for="benf_nature_of_work"><span class="mandatory-field">*&nbsp;</span>Nature of Work</label>
    <div class="col-md-3">
      <select class="form-control" ng-options="caste.id as caste.value for caste in natureOfWorks" ng-model="Beneficiary.benf_nature_of_work" name="benf_nature_of_work" ></select>
      <small class="error" ng-show="beneficiary.benf_nature_of_work.$invalid && beneficiary.benf_nature_of_work.$dirty">Please select Nature of Work</small>
    </div>
  </div>

  <div class="row form-group">
    <label class="control-label col-md-1" for="emplr_address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_line1" name="emplr_address_line1" placeholder="Line 1" maxlength="25" required />
      <small class="error" ng-show="beneficiary.emplr_address_line1.$invalid && beneficiary.emplr_address_line1.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="emplr_address_line2"><span class="mandatory-field">*&nbsp;</span>Line-2</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_line2" name="emplr_address_line2" placeholder="Line 2" maxlength="25" required />
      <small class="error" ng-show="beneficiary.emplr_address_line2.$invalid && beneficiary.emplr_address_line2.$dirty">Please provide Address</small>
    </div>

    <label class="control-label col-md-1" for="emplr_address_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_pincode" name="emplr_address_pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.emplr_address_pincode, 'employer')" required />
      <small class="error" ng-show="beneficiary.emplr_address_pincode.$invalid && beneficiary.emplr_address_pincode.$dirty">Please provide Pincode</small>
    </div>
    </div>
    <div class="row form-group">
    <label class="control-label col-md-1" for="emplr_address_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_taluk" name="emplr_address_taluk" placeholder="" maxlength="6" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="emplr_address_district"><span class="mandatory-field">*&nbsp;</span>District</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_district" name="emplr_address_district" placeholder="" maxlength="25" required readonly="true" />
    </div>

    <label class="control-label col-md-1" for="emplr_address_state"><span class="mandatory-field">*&nbsp;</span>State</label>
    <div class="col-md-3">
      <input class="form-control" ng-model="Beneficiary.emplr_address_state" name="emplr_address_state" placeholder="" maxlength="25" required readonly="true" />
    </div>
  </div>

  <div class="row">
    <label class="control-label col-md-1" for="benf_date_of_employment"><span class="mandatory-field">*&nbsp;</span>Date&nbsp;of Employment</label>
    <div class="col-md-3" ng-controller="DatepickerPopupController">
        <p class="input-group">
          <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_employment" is-open="popup1.opened" name="benf_date_of_employment" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Employment Date" />
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <small class="error" ng-show="beneficiary.benf_date_of_employment.$invalid && beneficiary.benf_date_of_employment.$dirty">Please provide date of employment and only acceptable format is DD-MM-YYYY</small>
    </div>

    <label class="control-label col-md-1" for="benf_wages_per_day"><span class="mandatory-field">*&nbsp;</span>Wages per Day</label>
    <div class="col-md-3" >
        <input class="form-control" ng-model="Beneficiary.benf_wages_per_day" name="benf_wages_per_day" placeholder="Wages per Day" required ng-value="" ng-change="setWagesPerMonth()" />
        <small class="error" ng-show="beneficiary.benf_wages_per_day.$invalid && beneficiary.benf_wages_per_day.$dirty">Please provide applicant wages per day</small>
    </div>

    <label class="control-label col-md-1" for="benf_wages_per_month"><span class="mandatory-field">*&nbsp;</span>Wages per&nbsp;Month</label>
    <div class="col-md-3" >
          <input class="form-control" ng-model="Beneficiary.benf_wages_per_month" name="benf_wages_per_month" placeholder="Wages per Month" ng-change="setWagesPerDay()" required />
        <small class="error" ng-show="beneficiary.benf_wages_per_month.$invalid && beneficiary.benf_wages_per_month.$dirty">Please provide applicant Age</small>
    </div>

  </div>

  <div class="row form-group">
    <label class="control-label col-md-2" for="benf_martial_status"><span class="mandatory-field">*&nbsp;</span>Martial Status :</label>
    <div class="col-md-8 radioButtons">
      <label ng-repeat="item in martialStatusList">
        <input required type="radio" name="benf_martial_status" ng-model="Beneficiary.benf_martial_status" value="{{item.entity_id}}" />
        {{item.entity_value}} &nbsp;&nbsp;
      </label>
      <small class="error" ng-show="beneficiary.benf_martial_status.$invalid && beneficiary.benf_martial_status.$dirty">Please select Maritial Status</small>
    </div>
  </div>
  
<!--
  <div class="row">
    <div class="col-md-12" style="margin-bottom: 40px">
        <table class="table">
            <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th ng-show="uploader.isHTML5">Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in uploader.queue">
                    <td><strong>{{ item.file.name }}</strong></td>
                    <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
                    <td nowrap>
                        <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                            <span class="glyphicon glyphicon-trash"></span> Remove
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

    <div class="row"  style="padding-left:1.5%">
        <input type="file" nv-file-select="" uploader="uploader" multiple  /><br/>
    </div>
  
-->
  <div class="form-group pull-right"> 
    <div class="col-sm-12">
      <button onclick="this.disabled=true;" ng-disabled="beneficiary.$invalid" type="submit" ng-click="Savedata()" class="btn btn-success">Save</button>
      <button type="button" ng-click="Back()" class="btn btn-success">Back</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </div>
  </div>

</form>
</div>

<style type="text/css">
  .bold{
    font-size: large;
  }
  label{
    text-align : right;
    /*padding-top : 0.1rem;*/
  }
</style>