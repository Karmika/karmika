<?php
use yii\helpers\Url;
$this->title = 'Register Beneficiary';
$url =  Yii::$app->homeUrl;?>

<div class="BeneficiaryCtrl" ng-cloak ng-controller="BeneficiaryController">
<div class="row">
  <section>
    <div class="wizard">
      <div class="wizard-inner">
        <div class="connecting-line"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Registration Details"><span class="round-tab"><i class="glyphicon glyphicon-user"> Registration-Details</i></span>
                    </a>
          </li>

          <li role="presentation" class="disabled">
            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Nominee Details"><span class="round-tab"><i class="glyphicon glyphicon-user"></i> Nominee Details</span>
                        </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Employer Details"><span class="round-tab"><i class="glyphicon glyphicon-certificate"></i> Employer Details</span>
                    </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Payments"><span class="round-tab"><i class="fa fa-inr" style="font-size:18px"></i> Payment</span>
                    </a>
          </li>
          <!--                     <li role="presentation" class="disabled">
                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Upload Files"><span class="round-tab"><i class="glyphicon glyphicon-upload"></i></span> Upload Files</a>
                </li> -->
          <li role="presentation" class="disabled">
            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Preview and Submit"><span class="round-tab"><i class="glyphicon glyphicon-ok"></i> Preview and Submit</span>
                    </a>
          </li>
          <!-- <li ng-show="AcknowledgementNumber" style="float:right;padding-top:10px;" class="text-success"><b>Acknowledgement No : {{AcknowledgementNumber}}</b></li> -->
        </ul>
      </div>

      <div role="">
        <div class="tab-content">
          <div class="tab-pane active" role="tabpanel" id="step1">
            <h3 align="center">Registration Details</h3>
            <hr/>
            <form class="form-vertical" name="beneficiary" role="form" novalidate>

              <div class="row form-group">
                <div class="row form-group pull-right col-md-2">
                  <div class="row" style="padding-left:1.5%">
                    <a class="nameLink"><img id="ProfilePicPreview" class="ProfilePicPreview" ng-cloak src="{{defaultPic}}" alt="your image" /></a> <br>
                    <input id="myFile" name="profilePicture" onchange="readURL(this)" style="display:none" class="col-sm-2" type="file" file-model="myFile" required />
                  </div>
                </div>
                <div class="pull-left col-md-10">
                  <label class="lable-bottom-margin">Personal Details&nbsp;:&nbsp; ವೈಯಕ್ತಿಕ ವಿವರಗಳು </label><br>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_first_name"><span class="mandatory-field">*&nbsp;</span>First&nbsp;Name ಮೊದಲ&nbsp;ಹೆಸರು </label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_first_name" name="benf_first_name" placeholder="First Name" maxlength="25" required />
                      <small class="error" ng-show="beneficiary.benf_first_name.$invalid && beneficiary.benf_first_name.$dirty">Please provide first name</small>
                    </div>
                    <label class="control-label col-md-2" for="benf_middle_name">Middle&nbsp;Name ಮಧ್ಯ ಹೆಸರು </label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_middle_name" name="benf_middle_name" placeholder="Middle Name" maxlength="25" />
                      <small class="error" ng-show="beneficiary.benf_middle_name.$invalid && beneficiary.benf_middle_name.$dirty">Please provide middle name</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_last_name">Last&nbsp;Name ಕೊನೆ ಹೆಸರು </label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_last_name" name="benf_last_name" placeholder="Last Name" maxlength="25" />
                      <small class="error" ng-show="beneficiary.benf_last_name.$invalid && beneficiary.benf_last_name.$dirty">Please provide Last name</small>
                    </div>

                    <label class="control-label col-md-2" for="benf_date_of_birth">Date&nbsp;of&nbsp;Birth ಜನ್ಮ ದಿನಾಂಕ</label>
                    <div class="col-md-4" ng-controller="DatepickerPopupController">
                      <p class="input-group">
                        <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_birth" is-open="popup1.opened" name="benf_date_of_birth" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select date of birth" />
                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                      </p>
                      <small class="error" ng-show="beneficiary.benf_date_of_birth.$invalid && beneficiary.benf_date_of_birth.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_age"><span class="mandatory-field">*&nbsp;</span>Age (years) ವಯಸ್ಸು</label>
                    <div class="col-md-4">
                      <input class="form-control" numerics-only ng-model="Beneficiary.beneficiary_age" name="benf_age" placeholder="Age" ng-change="setUnknownDOBbyAge('',Beneficiary.beneficiary_age,'Beneficiary')" required />
                      <small class="error" ng-show="beneficiary.benf_age.$invalid && beneficiary.benf_age.$dirty">Please provide applicant Age</small>
                    </div>

                    <label class="control-label col-md-2" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Sex ಲಿಂಗ</label>
                    <div class="col-md-4">
                      <label ng-repeat="item in genders"><input required type="radio" name="benf_sex" ng-model="Beneficiary.benf_sex" value="{{item.entity_id}}" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                      <small class="error" ng-show="beneficiary.benf_sex.$invalid && beneficiary.benf_sex.$dirty">Please select sex</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row form-group">

                <label class="control-label col-md-1" for="benf_caste"><span class="mandatory-field">*&nbsp;</span>Caste ಜಾತಿ</label>
                <div class="col-md-3">
                  <select class="form-control" ng-options="caste.id as caste.value for caste in casteList" ng-model="Beneficiary.benf_caste"></select>
                  <small class="error" ng-show="beneficiary.benf_caste.$invalid && beneficiary.benf_caste.$dirty">Please select caste</small>
                </div>

                <label class="control-label col-md-1" for="benf_mobile_no"><span class="mandatory-field">*&nbsp;</span>Mobile&nbsp;No.</label>
                <div class="col-md-3">
                  <input digitswithplusandhyphen-only maxlength="10" class="form-control" ng-model="Beneficiary.benf_mobile_no" name="benf_mobile_no" placeholder="Enter mobile number" required />
                  <small class="error" ng-show="beneficiary.benf_mobile_no.$invalid && beneficiary.benf_mobile_no.$dirty">Please provide mobile number</small>
                </div>

                <label class="control-label col-md-1" for="benf_alternate_mobile_no"><span class="mandatory-field"></span>Alternate Mobile&nbsp;No</label>
                <div class="col-md-3">
                  <input digitswithplusandhyphen-only maxlength="10" class="form-control" ng-model="Beneficiary.benf_alternate_mobile_no" name="benf_alternate_mobile_no" placeholder="Enter alternate mobile number" />
                </div>
              </div>
              <div class="row form-group">
                <label class="control-label col-md-1 stay-left" for="benf_martial_status"><span class="mandatory-field">*&nbsp;</span>Martial &nbsp; Status&nbsp; ವೈವಾಹಿಕ ಸ್ಥಿತಿ:</label>
                <div class="col-md-5 grey-border">
                  <label ng-repeat="item in martialStatusList"><input required type="radio" name="benf_martial_status" ng-model="Beneficiary.benf_martial_status" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                  <small class="error" ng-show="beneficiary.benf_martial_status.$invalid && beneficiary.benf_martial_status.$dirty">Please select Maritial Status</small>
                </div>
                <label class="control-label col-md-1" for="benf_blood_group"><span class="mandatory-field">*&nbsp;</span>Blood &nbsp;Group:&nbsp;ರಕ್ತದ ಗುಂಪು</label>
                <div class="col-md-5 grey-border">
                  <label ng-repeat="item in bloodGroupList"><input required type="radio" name="benf_blood_group" ng-model="Beneficiary.benf_blood_group" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                  <small class="error" ng-show="beneficiary.benf_blood_group.$invalid && beneficiary.benf_blood_group.$dirty">Please select Blood Group</small>
                </div>
              </div>
              <div class="row form-group">

                <label class="control-label col-md-1" for="nationality"><span class="mandatory-field">*&nbsp;</span>Nationality ರಾಷ್ಟ್ರೀಯತೆ</label>
                <div class="col-md-3">
                  <input letters-only class="form-control" ng-model="Beneficiary.nationality" name="nationality" placeholder="INDIAN" maxlength="25" required />
                  <small class="error" ng-show="beneficiary.nationality.$invalid && beneficiary.nationality.$dirty">Please provide nationality</small>
                </div>

                <label class="control-label col-md-1 stay-left" for="benf_identity_card_type"><span class="mandatory-field">*&nbsp;</span>Identity card Type&nbsp; ಗುರುತಿನ ಚೀಟಿ</label>
                <div class="col-md-3">
                  <select name="benf_identity_card_type" class="form-control" ng-model="Beneficiary.benf_identity_card_type" ng-options="cardType.id as cardType.value for cardType in IdentityCardTypeList"></select>
                  <small class="error" ng-show="beneficiary.benf_identity_card_type.$invalid && beneficiary.benf_identity_card_type.$dirty">Please select card type</small>
                </div>
                <label class="control-label col-md-1" for="benf_identity_card_number"><span class="mandatory-field">*&nbsp;</span>&nbsp;Card number :&nbsp; ಕಾರ್ಡ್ ಸಂಖ್ಯೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_identity_card_number" name="benf_identity_card_number" placeholder="Enter card number" required />
                  <small class="error" ng-show="beneficiary.benf_identity_card_number.$invalid && beneficiary.benf_identity_card_number.$dirty">Please enter card number </small>
                </div>
              </div>

              <label class="lable-bottom-margin">Applicant's Permanent Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ಖಾಯ೦ ವಿಳಾಸ </label>
              <div class="row form-group">
                <label class="control-label col-md-1" for="permanent_address_line1"><span class="mandatory-field">*&nbsp;</span>Address ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <textarea class="form-control" ng-model="Beneficiary.benf_prmt_address_line1" name="permanent_address_line1" placeholder="Permanent Address" maxlength="175" ng-change='setSameLocalIfTrue("line1")' required></textarea>
                  <small class="error" ng-show="beneficiary.permanent_address_line1.$invalid && beneficiary.permanent_address_line1.$dirty">Please provide Address</small>
                </div>

                <label class="control-label col-md-1" for="prmt_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode ಪಿನ್ ಕೋಡ್</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_prmt_address_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_prmt_address_pincode, 'permanent')" required />
                  <small class="error" ng-show="beneficiary.prmt_pincode.$invalid && beneficiary.prmt_pincode.$dirty">Please provide Pincode</small>
                </div>

                <label class="control-label col-md-1" for="permanent_address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit ಅಂಚೆ ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <select class="form-control" ng-model="Beneficiary.benf_prmt_address_line2" ng-options="officeName for officeName in Beneficiary.benf_prmt_address_OfficeList" name='permanent_address_line2' ng-change='setSameLocalIfTrue("line2")' ng-readonly="Beneficiary.benf_prmt_address_OfficeList.length==0" name="permanent_address_line2"></select>
                  <small class="error" ng-show="beneficiary.permanent_address_line2.$invalid && beneficiary.permanent_address_line2.$dirty">Please provide Address</small>
                </div>
              </div>
              <div class="row form-group">
                <label class="control-label col-md-1" for="prmt_address_line_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk ತಾಲ್ಲೂಕು</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_prmt_address_taluk" name="prmt_address_line_taluk" placeholder="" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="address_line1"><span class="mandatory-field">*&nbsp;</span>District ಜಿಲ್ಲೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_prmt_address_district" name="address_line1" placeholder="" maxlength="25" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="address_line2"><span class="mandatory-field">*&nbsp;</span>State ರಾಜ್ಯ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_prmt_address_state" name="address_line2" placeholder="" maxlength="25" required readonly="true" />
                </div>
              </div>
              <hr/>
              <p class="row">
                <label class="col-md-6 stay-left lable-bottom-margin">Applicant's Local Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ಸ್ಥಳೀಯ ವಿಳಾಸ</label><span class="col-md-3 col-md-offset-3 pull-right"><input type="checkbox" class="" name="" ng-change="toggleSameAsPermanentAddress()" ng-model='Benf.sameAsPermanentAddress'> Same as Permanent Address </span>
              </p>
              <div class="row form-group">
                <label class="control-label col-md-1" for="address_line1"><span class="mandatory-field">*&nbsp;</span>Address ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <textarea class="form-control" ng-model="Beneficiary.benf_local_address_line1" name="address_line1" placeholder="Local Address" maxlength="175" required ng-readonly="Benf.sameAsPermanentAddress"></textarea>
                  <small class="error" ng-show="beneficiary.address_line1.$invalid && beneficiary.address_line1.$dirty">Please provide Address</small>
                </div>

                <label class="control-label col-md-1" for="pincode"><span class="mandatory-field">*&nbsp;</span>Pincode ಪಿನ್ ಕೋಡ್</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_local_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_local_pincode, 'local')" ng-readonly="Benf.sameAsPermanentAddress" required />
                  <small class="error" ng-show="beneficiary.pincode.$invalid && beneficiary.pincode.$dirty">Please provide Pincode</small>
                </div>

                <label class="control-label col-md-1" for="address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit ಅಂಚೆ ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <select class="form-control" ng-model="Beneficiary.benf_local_address_line2" ng-options="officeName for officeName in Beneficiary.benf_local_address_OfficeList" ng-readonly="Benf.sameAsPermanentAddress"></select>
                  <small class="error" ng-show="beneficiary.address_line2.$invalid && beneficiary.address_line2.$dirty">Please provide Address</small>
                </div>
              </div>
              <div class="row form-group">
                <label class="control-label col-md-1" for="local_address_line1"><span class="mandatory-field">*&nbsp;</span>Taluk ತಾಲ್ಲೂಕು</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_local_address_taluk" name="local_address_line1" placeholder="" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="local_address_district"><span class="mandatory-field">*&nbsp;</span>District ಜಿಲ್ಲೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_local_address_district" name="local_address_district" placeholder="" maxlength="25" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="local_address_line_state"><span class="mandatory-field">*&nbsp;</span>State ರಾಜ್ಯ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_local_address_state" name="local_address_line_state" placeholder="" maxlength="25" required readonly="true" />
                </div>
              </div>
              <br>
              <!-- BANK Details -->
              <hr/>
              <label class="lable-bottom-margin">ಬ್ಯಾಂಕ್ ವಿವರ Bank Details &nbsp;:&nbsp; </label>
              <div class="row form-group">
                <label class="control-label col-md-1" for="benf_bank_account_number"><span class="mandatory-field">*&nbsp;</span>Account Number ಖಾತೆ ಸಂಖ್ಯೆ</label>
                <div class="col-md-3">
                  <input class="form-control" numerics-only ng-model="Beneficiary.benf_bank_account_number" name="benf_bank_account_number" placeholder="Account Number" maxlength=15 required />
                  <small class="error" ng-show="beneficiary.benf_bank_account_number.$invalid && beneficiary.benf_bank_account_number.$dirty">Please provide bank account Number</small>
                </div>

                <label class="control-label col-md-1" for="benf_bank_account_type"><span class="mandatory-field">*&nbsp;</span>Account Type ಖಾತೆಯ ವಿಧ</label>
                <div class="col-md-3">
                  <select class="form-control" ng-options="type.id as type.value for type in accountTypeList" ng-model="Beneficiary.benf_bank_account_type"></select>
                  <small class="error" ng-show="beneficiary.benf_bank_account_type.$invalid && beneficiary.benf_bank_account_type.$dirty">Please provide bank account type</small>
                </div>

                <label class="control-label col-md-1" for="benf_bank_name"><span class="mandatory-field">*&nbsp;</span>Bank ಬ್ಯಾಂಕ್</label>
                <div class="col-md-3">
                  <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_name" name="benf_bank_name" placeholder="Bank Name" maxlength="25" required />
                  <small class="error" ng-show="beneficiary.benf_bank_name.$invalid && beneficiary.benf_bank_name.$dirty">Please provide Bank name</small>
                </div>
              </div>

              <div class="row form-group">
                <label class="control-label col-md-1" for="benf_bank_branch"><span class="mandatory-field">*&nbsp;</span>Branch ಶಾಖೆ</label>
                <div class="col-md-3">
                  <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_branch" name="benf_bank_branch" placeholder="bank branch Name" maxlength="25" required />
                  <small class="error" ng-show="beneficiary.benf_bank_branch.$invalid && beneficiary.benf_bank_branch.$dirty">Please provide Bank Branch name</small>
                </div>

                <label class="control-label col-md-1" for="benf_bank_ifsc"><span class="mandatory-field">*&nbsp;</span>IFSC </label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_bank_ifsc" name="benf_bank_ifsc" placeholder="IFSC code" maxlength="16" required />
                  <small class="error" ng-show="beneficiary.benf_bank_ifsc.$invalid && beneficiary.benf_bank_ifsc.$dirty">Please provide IFSC of Bank</small>
                </div>
              </div>

              <hr>
              <label class="lable-bottom-margin">Name and address of Present Employer&nbsp;:&nbsp;</label>
              <div class="row form-group">
                <label class="control-label col-md-1" for="employer_full_name"><span class="mandatory-field">*&nbsp;</span>Employer Name</label>
                <div class="col-md-7">
                  <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.employer_full_name" name="employer_full_name" placeholder="Employer Full Name" maxlength="40" required />
                  <small class="error" ng-show="beneficiary.employer_full_name.$invalid && beneficiary.employer_full_name.$dirty">Please provide employer name</small>
                </div>

                <label class="control-label col-md-1" for="benf_nature_of_work"><span class="mandatory-field">*&nbsp;</span>Nature of Work ಕೆಲಸದ ಸ್ವರೂಪ</label>
                <div class="col-md-3">
                  <select class="form-control" ng-options="caste.id as caste.value for caste in natureOfWorks" ng-model="Beneficiary.benf_nature_of_work"></select>
                  <small class="error" ng-show="beneficiary.benf_nature_of_work.$invalid && beneficiary.benf_nature_of_work.$dirty">Please select Nature of Work</small>
                </div>
              </div>
              <div class="row">
                <label class="control-label col-md-1" for="benf_date_of_employment"><span class="mandatory-field">*&nbsp;</span>Date&nbsp;of Employment ಉದ್ಯೋಗಕ್ಕೆ ಸೇರಿದ ದಿನಾಂಕ</label>
                <div class="col-md-3" ng-controller="DatepickerPopupController">
                  <p class="input-group">
                    <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_employment" is-open="popup1.opened" name="benf_date_of_employment" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Employment Date" />
                    <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                  </p>
                  <small class="error" ng-show="beneficiary.benf_date_of_employment.$invalid && beneficiary.benf_date_of_employment.$dirty">Please provide date of employment and only acceptable format is DD-MM-YYYY</small>
                </div>

                <label class="control-label col-md-1" for="benf_wages_per_day"><span class="mandatory-field">*&nbsp;</span>Wages per Day (Rs.) ವೇತನ ಒಂದು ದಿನಕ್ಕೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_wages_per_day" name="benf_wages_per_day" placeholder="Wages per Day" required ng-value="" ng-change="setWagesPerMonth()" />
                  <small class="error" ng-show="beneficiary.benf_wages_per_day.$invalid && beneficiary.benf_wages_per_day.$dirty">Please provide applicant wages per day</small>
                </div>

                <label class="control-label col-md-1" for="benf_wages_per_month"><span class="mandatory-field">*&nbsp;</span>Wages per&nbsp;Month (Rs) ವೇತನ ಪ್ರತಿ ತಿಂಗಳಿಗೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.benf_wages_per_month" name="benf_wages_per_month" placeholder="Wages per Month" ng-change="setWagesPerDay()" required />
                  <small class="error" ng-show="beneficiary.benf_wages_per_month.$invalid && beneficiary.benf_wages_per_month.$dirty">Please provide applicant wages detail</small>
                </div>
              </div>
              <div class="row form-group">
                <label class="control-label col-md-1" for="emplr_address_line1"><span class="mandatory-field">*&nbsp;</span>Address ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <textarea class="form-control" ng-model="Beneficiary.emplr_address_line1" name="emplr_address_line1" placeholder="Employer Address" maxlength="175" required></textarea>
                  <small class="error" ng-show="beneficiary.emplr_address_line1.$invalid && beneficiary.emplr_address_line1.$dirty">Please provide Address</small>
                </div>

                <label class="control-label col-md-1" for="emplr_address_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode ಪಿನ್ ಕೋಡ್</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.emplr_address_pincode" name="emplr_address_pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.emplr_address_pincode, 'employer')" required />
                  <small class="error" ng-show="beneficiary.emplr_address_pincode.$invalid && beneficiary.emplr_address_pincode.$dirty">Please provide Pincode</small>
                </div>

                <label class="control-label col-md-1" for="emplr_address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit ಅಂಚೆ ವಿಳಾಸ</label>
                <div class="col-md-3">
                  <select class="form-control" name="address_line2" ng-model="Beneficiary.emplr_address_line2" ng-options="officeName for officeName in Beneficiary.emplr_address_OfficeList" ng-readonly="Beneficiary.emplr_address_OfficeList.length==0"></select>
                  <small class="error" ng-show="beneficiary.emplr_address_line2.$invalid && beneficiary.emplr_address_line2.$dirty">Please provide Address</small>
                </div>
              </div>
              <div class="row form-group">
                <label class="control-label col-md-1" for="emplr_address_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk ತಾಲ್ಲೂಕು</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.emplr_address_taluk" name="emplr_address_taluk" placeholder="" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="emplr_address_district"><span class="mandatory-field">*&nbsp;</span>District ಜಿಲ್ಲೆ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.emplr_address_district" name="emplr_address_district" placeholder="" maxlength="25" required readonly="true" />
                </div>

                <label class="control-label col-md-1" for="emplr_address_state"><span class="mandatory-field">*&nbsp;</span>State ರಾಜ್ಯ</label>
                <div class="col-md-3">
                  <input class="form-control" ng-model="Beneficiary.emplr_address_state" name="emplr_address_state" placeholder="" maxlength="25" required readonly="true" />
                </div>
              </div>

              <hr>
              <div class="row form-group pull-right">
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-success next-step" ng-disabled="beneficiary.$invalid || form1submitted" ng-click="SaveRegistrationDetails()">Save and continue</button>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane" role="tabpanel" id="step2">
            <h3 align="center">Nominee Details ನಾಮನಿರ್ದೇಶಿತರ ಪಟ್ಟಿ</h3>
            <hr/>

            <h4>Nominee List</h4>
            <div class="row" style="text-align:center;">
              <div class="col-md-2">
                <label>Nominee Full Name ನಾಮನಿರ್ದೇಶಿತರ ಪೂರ್ಣ ಹೆಸರು<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-3">
                <label>Nominee Address ನಾಮನಿರ್ದೇಶಿತರ ವಿಳಾಸ<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-2">
                <label>Date of Birth ಜನ್ಮ ದಿನಾಂಕ</label>
              </div>
              <div class="col-md-1">
                <label>Age (years) ವಯಸ್ಸು<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-1">
                <label>% Share ಶೇಕಡವಾರು ಪಾಲು<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-2">
                <label>Relationship with Applicant ಫಲಾನುಭವಿಗೆ ಇರುವ ಸಂಬಂಧ<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-1">
                <label>Edit</label>
              </div>
            </div>
            <form role='form' name="NomineeForm" novalidate class="form-vertical table table-bordered table-compressed">
              <div class="row" ng-repeat="nominee in NomineeList" style="margin:0.5rem;">
                <div class="col-md-2">
                  <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model='nominee.nominee_full_name' name="nominee_full_name{{$index}}" placeholder="Full Name" maxlength="100" required />
                  <small class="error" ng-show="NomineeForm.nominee_full_name{{$index}}.$invalid && NomineeForm.nominee_full_name{{$index}}.$dirty">Please provide nominee name</small>
                </div>
                <div class="col-md-3">
                  <textarea name='nominee_address_{{$index}}' class="form-control" ng-model='nominee.nominee_address' required></textarea>
                  <small class="error" ng-show="NomineeForm.nominee_address_{{$index}}.$invalid && NomineeForm.nominee_address_{{$index}}.$dirty">Please provide nominee address</small>
                </div>
                <div class="col-md-2">
                  <p class="input-group" ng-controller="DatepickerPopupController">
                    <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="nominee.nominee_dob" is-open="popup1.opened" name="nominee_dob_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Date of Birth" ng-change="calculateAgeForNominee($index)" />
                    <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                  </p>
                  <small class="error" ng-show="NomineeForm.nominee_dob_{{$index}}.$invalid && NomineeForm.nominee_dob_{{$index}}.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                </div>
                <div class="col-md-1">
                  <input class="form-control" numerics-only ng-model="nominee.nominee_age" name="nominee_age_{{$index}}" placeholder="Age" ng-change="setUnknownDOBbyAge($index,nominee.nominee_age,'Nominee')" required />
                  <small class="error" ng-show="NomineeForm.nominee_age_{{$index}}.$invalid && NomineeForm.nominee_age_{{$index}}.$dirty">Please provide nominee Age</small>
                </div>
                <div class="col-md-1">
                  <input class="form-control" numerics-only ng-model="nominee.nominee_share" name="nominee_share_{{$index}}" placeholder="% share" ng-change='changedPercentage($index)' required />
                  <small class="error" ng-show="NomineeForm.nominee_share_{{$index}}.$invalid && NomineeForm.nominee_share_{{$index}}.$dirty">Please provide percentage share</small>
                </div>
                <div class="col-md-2">
                  <input class="form-control" letterswithsinglequoteandhyphendot-only ng-model="nominee.nominee_relationship_with_benf" name="nominee_relationship_with_benf_{{$index}}" placeholder="Relation" maxlength="25" required />
                  <small class="error" ng-show="NomineeForm.nominee_relationship_with_benf_{{$index}}.$invalid && NomineeForm.nominee_relationship_with_benf_{{$index}}.$dirty">Please provide Relation with Benefeciary</small>
                </div>
                <div class="col-md-1" style="text-align: right;">
                  <div class="row">
                    <div class="col-md-5">
                      <button class="btn btn-default" ng-click="insertNominee($index)"><i class="glyphicon glyphicon-user"></i></button>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                      <button class="btn btn-danger" ng-click="deleteNominee($index)" ng-show='NomineeList.length>1' tooltop='Add one more Nominee'><i class="glyphicon glyphicon-remove"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-inline pull-right">
                <!-- <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="button" class="btn btn-default next-step">Skip</button></li> -->
                <!-- <li><button type="button" class="btn btn-success btn-info-full" ng-disabled="NomineeForm.$invalid" >Save Dependents</button></li> -->
              </ul>
            </form>

            <h4>Dependents List ಅವಲಂಭಿತರ ಪಟ್ಟಿ</h4>
            <div class="row" style="text-align:center;">
              <div class="col-md-3">
                <label>Dependent Full Name ಅವಲಂಭಿತರ ಪೂರ್ಣ ಹೆಸರು<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-3">
                <label>Dependent Address ಅವಲಂಭಿತರ ವಿಳಾಸ<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-2">
                <label>Date of Birth ಜನ್ಮ ದಿನಾಂಕ</label>
              </div>
              <div class="col-md-1">
                <label>Age (years) ವಯಸ್ಸು <span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-2">
                <label>Relationship with Applicant ಫಲಾನುಭವಿಗೆ ಇರುವ ಸಂಬಂಧ<span class="mandatory-field">*&nbsp;</span></label>
              </div>
              <div class="col-md-1">
                <label>Edit</label>
              </div>
            </div>
            <form role='form' name="DependentForm" novalidate class="form-vertical table table-bordered table-compressed">
              <div class="row" ng-repeat="dependent in DependentsList" style="margin:0.5rem;">
                <div class="col-md-3">
                  <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model='dependent.depnt_full_name' name="depnt_full_name_{{$index}}" placeholder="Full Name" maxlength="100" required />
                  <small class="error" ng-show="DependentForm.depnt_full_name_{{$index}}.$invalid && DependentForm.depnt_full_name_{{$index}}.$dirty">Please provide dependent name</small>
                </div>
                <div class="col-md-3">
                  <textarea name='depnt_address_{{$index}}' class="form-control" ng-model='dependent.depnt_address' required></textarea>
                  <small class="error" ng-show="DependentForm.depnt_address_{{$index}}.$invalid && DependentForm.depnt_address_{{$index}}.$dirty">Please provide dependent address</small>
                </div>

                <div class="col-md-2">
                  <p class="input-group" ng-controller="DatepickerPopupController">
                    <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="dependent.depnt_dob" is-open="popup1.opened" name="depnt_dob_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Date of Birth" ng-change="calculateAgeForDependent($index)" />
                    <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                  </p>
                  <small class="error" ng-show="DependentForm.depnt_dob_{{$index}}.$invalid && DependentForm.depnt_dob_{{$index}}.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                </div>
                <div class="col-md-1">
                  <input class="form-control" numerics-only ng-model="dependent.depnt_age" name="depnt_age_{{$index}}" placeholder="Age" ng-change="setUnknownDOBbyAge($index,dependent.depnt_age,'Dependents')" required />
                  <small class="error" ng-show="DependentForm.depnt_age_{{$index}}.$invalid && DependentForm.depnt_age_{{$index}}.$dirty">Please provide depnt_age Age</small>
                </div>
                <div class="col-md-2">
                  <input class="form-control" letterswithsinglequoteandhyphendot-only ng-model="dependent.depnt_relationship_with_benf" name="depnt_relationship_with_benf_{{$index}}" placeholder="Relation" maxlength="25" required />
                  <small class="error" ng-show="DependentForm.depnt_relationship_with_benf_{{$index}}.$invalid && DependentForm.depnt_relationship_with_benf_{{$index}}.$dirty">Please provide Relation with Benefeciary</small>
                </div>
                <div class="col-md-1" style="text-align: right;">
                  <div class="row">
                    <button class="col-md-5 btn btn-default" ng-click="insertDependent($index)"><i class="glyphicon glyphicon-user"></i></button>
                    <button class="col-md-offset-1 col-md-5 btn btn-danger" ng-click="deleteDependent($index)" ng-show='DependentsList.length>1'><i class="glyphicon glyphicon-remove"></i></button>
                  </div>
                </div>
              </div>
              <ul class="list-inline pull-right" style="padding-top:15px;">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button type="button" class="btn btn-success btn-info-full next-step" ng-disabled="DependentForm.$invalid || NomineeForm.$invalid" ng-click='saveNomineeAndDependents()'>Save and continue</button></li>
              </ul>
            </form>
          </div>
          <div class="tab-pane" role="tabpanel" id="step3">
            <h3 align="center">Employment Certificate</h3>
            <hr/>
            <div class="row">
              <form class="col-sm-10">
                <label class="control-label col-md-2"><span class="mandatory-field"></span>Select Form Type :</label>
                <label for="FormType"><input type="radio" name="FormType" ng-model="Certificates.FormType" value="V">&nbsp;Form V&nbsp;&nbsp;</label>
                <label for="FormType"><input type="radio" name="FormType" ng-model="Certificates.FormType" value="IV">&nbsp;Form VI&nbsp;&nbsp;</label>
              </form>
              <button ng-click="AddCertificate($index)" ng-show="Certificates.Forms.length>0" class="btn btn-success pull-right" style="margin-right:15px;">Add Certificate</button>
            </div><br>

            <form ng-show="Certificates.FormType == 'V'" role='form' name="EmploymentFormV" novalidate class="form-vertical">
              <div ng-repeat="frm in  Certificates.Forms" class="panel panel-success">
                <div class="panel-heading text-left"><b>Certificate {{$index+1}}</b>
                  <button class="btn btn-danger pull-right" style="margin-top:-9px;margin-right:-15px;" ng-show="Certificates.Forms.length>1" ng-click="deleteCertificate($index)" tooltop="Add one more certificates" style=""><i class="glyphicon glyphicon-remove"></i></button>
                </div>
                <div class="panel-body">
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_employer_full_name_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Employer&nbsp;Full&nbsp;Name</label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Certificates.Forms[$index].benf_employer_full_name" name="benf_employer_full_name_{{$index}}" placeholder="First Name" maxlength="25" required />
                      <small class="error" ng-show="EmploymentFormV.benf_employer_full_name_{{$index}}.$invalid && EmploymentFormV.benf_employer_full_name_{{$index}}.$dirty">Please provide employer first name</small>
                    </div>
                    <label class="control-label col-md-2" for="benf_present_project_name_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Project&nbsp;Name</label>
                    <div class="col-md-4">
                      <input class="form-control" ng-model="Certificates.Forms[$index].benf_present_project_name" name="benf_present_project_name_{{$index}}" placeholder="Address" maxlength="25"></input>
                      <small class="error" ng-show="EmploymentFormV.benf_present_project_name_{{$index}}.$invalid && EmploymentFormV.benf_present_project_name_{{$index}}.$dirty">Please provide project name</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="emp_union_full_name_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Union&nbsp;Full&nbsp;Name</label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Certificates.Forms[$index].emp_union_full_name" name="emp_union_full_name_{{$index}}" placeholder="Union Full Name" maxlength="25" required />
                      <small class="error" ng-show="EmploymentFormV.emp_union_full_name_{{$index}}.$invalid && EmploymentFormV.emp_union_full_name_{{$index}}.$dirty">Please provide union full name</small>
                    </div>
                    <label class="control-label col-md-2" for="emp_union_branch_address_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Union&nbsp;Address</label>
                    <div class="col-md-4">
                      <textarea class="form-control" ng-model="Certificates.Forms[$index].emp_union_branch_address" name="emp_union_branch_address_{{$index}}" placeholder="Address" maxlength="250" required></textarea>
                      <small class="error" ng-show="EmploymentFormV.emp_union_branch_address_{{$index}}.$invalid && EmploymentFormV.emp_union_branch_address_{{$index}}.$dirty">Please provide union address</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_present_work_address_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;Address</label>
                    <div class="col-md-4">
                      <textarea class="form-control" ng-model="Certificates.Forms[$index].benf_present_work_address" name="benf_present_work_address_{{$index}}" placeholder="Address" maxlength="250" required></textarea>
                      <small class="error" ng-show="EmploymentFormV.benf_present_work_address_{{$index}}.$invalid && EmploymentFormV.benf_present_work_address_{{$index}}.$dirty">Please provide work address</small>
                    </div>
                    <label class="control-label col-md-2" for="benf_work_start_date_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;Start&nbsp;Date</label>
                    <div class="col-md-4" ng-controller="DatepickerPopupController">
                      <p class="input-group">
                        <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-click="open1()" ng-model="Certificates.Forms[$index].benf_work_start_date" is-open="popup1.opened" name="benf_work_start_date_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select work start date" required />
                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                      </p>
                      <small class="error" ng-show="EmploymentFormV.benf_work_start_date_{{$index}}.$invalid && EmploymentFormV.benf_work_start_date_{{$index}}.$dirty">Please provide work start date and only acceptable format is DD-MM-YYYY</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_work_end_date_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;End&nbsp;Date</label>
                    <div class="col-md-4" ng-controller="DatepickerPopupController">
                      <p class="input-group">
                        <input date-validation class="form-control" ng-click="open1()" uib-datepicker-popup="{{format}}" ng-model="Certificates.Forms[$index].benf_work_end_date" is-open="popup1.opened" name="benf_work_end_date_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select work start date" required />
                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                      </p>
                      <small class="error" ng-show="EmploymentFormV.benf_work_end_date_{{$index}}.$invalid && EmploymentFormV.benf_work_end_date_{{$index}}.$dirty">Please provide work end date and only acceptable format is DD-MM-YYYY</small>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <form ng-show="Certificates.FormType == 'IV'" role='form' name="EmploymentFormIV" novalidate class="form-vertical">
              <div ng-repeat="frm in  Certificates.Forms" class="panel panel-success">
                <div class="panel-heading text-left"><b>Certificate {{$index+1}}</b>
                  <button class="btn btn-danger pull-right" style="margin-top:-9px;margin-right:-15px;" ng-show="Certificates.Forms.length>1" ng-click="deleteCertificate($index)" tooltop="Add one more certificates" style=""><i class="glyphicon glyphicon-remove"></i></button>
                </div>
                <div class="panel-body">
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_employer_full_name_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Employer&nbsp;Full&nbsp;Name</label>
                    <div class="col-md-4">
                      <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Certificates.Forms[$index].benf_employer_full_name" name="benf_employer_full_name_{{$index}}" placeholder="First Name" maxlength="25" required />
                      <small class="error" ng-show="EmploymentFormIV.benf_employer_full_name_{{$index}}.$invalid && EmploymentFormIV.benf_employer_full_name_{{$index}}.$dirty">Please provide employer first name</small>
                    </div>
                    <label class="control-label col-md-2" for="benf_present_project_name_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Project&nbsp;Name</label>
                    <div class="col-md-4">
                      <input class="form-control" ng-model="Certificates.Forms[$index].benf_present_project_name" name="benf_present_project_name_{{$index}}" placeholder="Address" maxlength="25"></input>
                      <small class="error" ng-show="EmploymentFormIV.benf_present_project_name_{{$index}}.$invalid && EmploymentFormIV.benf_present_project_name_{{$index}}.$dirty">Please provide project name</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_present_work_address_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;Address</label>
                    <div class="col-md-4">
                      <textarea class="form-control" ng-model="Certificates.Forms[$index].benf_present_work_address" name="benf_present_work_address_{{$index}}" placeholder="Address" maxlength="250" required></textarea>
                      <small class="error" ng-show="EmploymentFormIV.benf_present_work_address_{{$index}}.$invalid && EmploymentFormIV.benf_present_work_address_{{$index}}.$dirty">Please provide work address</small>
                    </div>
                    <label class="control-label col-md-2" for="benf_work_start_date_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;Start&nbsp;Date</label>
                    <div class="col-md-4" ng-controller="DatepickerPopupController">
                      <p class="input-group">
                        <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-click="open1()" ng-model="Certificates.Forms[$index].benf_work_start_date" is-open="popup1.opened" name="benf_work_start_date_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select work start date" required />
                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                      </p>
                      <small class="error" ng-show="EmploymentFormIV.benf_work_start_date_{{$index}}.$invalid && EmploymentFormIV.benf_work_start_date_{{$index}}.$dirty">Please provide work start date and only acceptable format is DD-MM-YYYY</small>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="control-label col-md-2" for="benf_work_end_date_{{$index}}"><span class="mandatory-field">*&nbsp;</span>Work&nbsp;End&nbsp;Date</label>
                    <div class="col-md-4" ng-controller="DatepickerPopupController">
                      <p class="input-group">
                        <input date-validation class="form-control" ng-click="open1()" uib-datepicker-popup="{{format}}" ng-model="Certificates.Forms[$index].benf_work_end_date" is-open="popup1.opened" name="benf_work_end_date_{{$index}}" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select work start date" required />
                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                      </p>
                      <small class="error" ng-show="EmploymentFormIV.benf_work_end_date_{{$index}}.$invalid && EmploymentFormIV.benf_work_end_date_{{$index}}.$dirty">Please provide work end date and only acceptable format is DD-MM-YYYY</small>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <br><br>
            <ul class="list-inline pull-right">
              <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
              <li ng-show="Certificates.FormType == 'V'"><button type="button" class="btn btn-primary btn-info-full next-step" ng-disabled="EmploymentFormV.$invalid" ng-click="SaveCertificate(FormType)">Save and Continue</button></li>
              <li ng-show="Certificates.FormType == 'IV'"><button type="button" class="btn btn-primary btn-info-full next-step" ng-disabled="EmploymentFormIV.$invalid" ng-click="SaveCertificate(FormType)">Save and Continue</button></li>
            </ul>
          </div>

          <div class="tab-pane" role="tabpanel" id="step4">
            <h3 align="center">Payment</h3>
            <hr/>
            <form role='form' name="PaymentCreateForm" novalidate class="form-vertical">
              <div class="row form-group">
                <label class="control-label col-sm-2" for="amount"><span class="mandatory-field">*&nbsp;</span>Amount :</label>
                <div class="col-sm-4">
                  <input numerics-only class="form-control" ng-model="Payment.amount" ng-disabled="true" name="amount" placeholder="Enter amount" required />
                  <small class="error" ng-show="PaymentCreateForm.amount.$invalid && PaymentCreateForm.amount.$dirty">Please provide amount</small>
                </div>

                <label class="control-label col-sm-2" for="payment_for"><span class="mandatory-field">*&nbsp;</span>Payment For :</label>
                <div class="col-sm-4">
                  <select ng-disabled="true" required name="payment_for" class="form-control" ng-model="Payment.payment_for" ng-options="for.entity_value for for in paymentFors track by for.entity_id">
                                <option value="">Please select payment for </option>
                              </select>
                  <small class="error" ng-show="PaymentCreateForm.payment_for.$invalid && PaymentCreateForm.payment_for.$dirty">Please provide payment for</small>
                </div>
              </div>

              <div class="row form-group">
                <label class="control-label col-sm-2" for="payment_status"><span class="mandatory-field">*&nbsp;</span>Payment Status :</label>
                <div class="col-sm-4">
                  <select ng-disabled="true" required name="payment_status" class="form-control" ng-model="Payment.payment_status" ng-options="status.entity_value for status in paymentStatuses track by status.entity_id">
                                  <option value="">Please select payment status </option>
                              </select>
                  <small class="error" ng-show="PaymentCreateForm.payment_status.$invalid && PaymentCreateForm.payment_status.$dirty">Please provide payment status</small>
                </div>

                <label class="control-label col-sm-2" for="payment_reference_id"><span class="mandatory-field">*&nbsp;</span>Payment Reference Id :</label>
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
                <label class="control-label col-sm-2" for="chequeordd_no"><span class="mandatory-field">*&nbsp;</span>Challan / DD No :</label>
                <div class="col-sm-4">
                  <input alphanumerics-only class="form-control" ng-model="Payment.chequeordd_no" name="chequeordd_no" placeholder="Enter Challan / DD No" ng-required="BankAndPaydateFieldShow" />
                  <small class="error" ng-show="PaymentCreateForm.chequeordd_no.$invalid && PaymentCreateForm.chequeordd_no.$dirty">Please provide Challan or DD no</small>
                </div>
                <label class="control-label col-sm-2" for="bank_name">&nbsp;&nbsp;Bank Name :</label>
                <div class="col-sm-4">
                  <input class="form-control" ng-model="Payment.bank_name" name="bank_name" placeholder="Enter bank name" />
                </div>
              </div>
              <div class="row form-group">
                <div ng-show="BankAndPaydateFieldShow">
                  <label class="control-label col-sm-2" for="ifsc_code">&nbsp;&nbsp;IFSC</label>
                  <div class="col-sm-4">
                    <input class="form-control" ng-model="Payment.ifsc_code" name="ifsc_code" placeholder="Enter ifsc code" />
                  </div>
                </div>
                <label class="control-label col-sm-2" for="notes">&nbsp;&nbsp;Remarks :</label>
                <div class="col-sm-4">
                  <textarea min="1" max="250" class="form-control" ng-model="Payment.notes" name="notes" placeholder="Enter remarks"></textarea>
                </div>
              </div>

              <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button ng-disabled="PaymentCreateForm.$invalid" type="button" ng-click="CreatePayment()" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
              </ul>
            </form>
          </div>

<!--      <div class="tab-pane" role="tabpanel" id="step4">
                    <h3 align="center">Upload Files</h3>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 40px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="70%">Document Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in AllUploads">
                                        <td>{{ item }}</td>
                                        <td nowrap>
                                            <button type="button" class="btn btn-danger btn-xs" ng-click="RemoveFromList(item)">
                                                <span class="glyphicon glyphicon-trash"></span> Remove
                                            </button>
                                        </td>
                                    </tr>
                                    <tr ng-if="AllUploads.length < 1">
                                        <td colspan="4">
                                            <p class="text-center" style="color:red">-- Please upload your files here --</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row" style="padding-left:1.5%">
                        <input id="myFile" class="col-sm-2" type="file" file-model="myFile" />
                        <button class="col-sm-2" ng-click="UploadFile()">Upload</button>
                    </div>
                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                    </ul>
                </div> -->

          <div class="tab-pane" role="tabpanel" id="complete">
            <h3 align="center">Preview and Submit</h3>
            <hr/>
            <div class="panel-group" id="accordion">
              <div class="panel panel-success">
                <div data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-heading cursorPointer"><b>Registration Details</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                <div id="collapse1" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <br>
                        <div class="row">
                          <div class="col-sm-7">
                            &nbsp;&nbsp;<b>01 ) First Name <span class="pull-right WordsLeftStyle">:</span></b>
                          </div>
                          <div class="col-sm-5">
                            {{Beneficiary.benf_first_name}}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-7">
                            &nbsp;&nbsp;<b>02 ) Middle Name <span class="pull-right WordsLeftStyle">:</span></b>
                          </div>
                          <div class="col-sm-5">
                            {{Beneficiary.benf_middle_name}}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-7">
                            &nbsp;&nbsp;<b>03 ) Last Name <span class="pull-right WordsLeftStyle">:</span></b>
                          </div>
                          <div class="col-sm-5">
                            {{Beneficiary.benf_last_name}}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-7">
                            &nbsp;&nbsp;<b>04 ) Date Of Birth <span class="pull-right WordsLeftStyle">:</span></b>
                          </div>
                          <div class="col-sm-5">
                            {{Beneficiary.benf_date_of_birth | date }}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-7">
                            &nbsp;&nbsp;<b>05 ) Age <span class="pull-right WordsLeftStyle">:</span></b>
                          </div>
                          <div class="col-sm-5">
                            {{Beneficiary.beneficiary_age}}
                          </div>
                        </div>
                        <br/>
                      </div>
                      <div class="col-sm-2 pull-right">
                        <img class="ProfilePicPreview" src="{{defaultPic}}" alt="your image" />
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 pull-left">
                            <div class="row">
                              <div class="col-sm-7">
                                &nbsp;&nbsp;<b>06 ) Sex <span class="pull-right WordsLeftStyle">:</span></b>
                              </div>
                              <div class="col-sm-5">
                                {{Beneficiary.benf_sex}}
                              </div>
                            </div>
                        </div>
                    <br><br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>07 ) Nationality <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.nationality}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>08 ) Caste <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_caste}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>09 ) Martial Status  <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_martial_status}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>10 ) Blood Group <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_blood_group}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>11 ) Mobile No. <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_mobile_no}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>12 )  Beneficiary Permanent Address <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_prmt_address_line1}},&nbsp;{{Beneficiary.benf_prmt_address_line2}},<br> {{Beneficiary.benf_prmt_address_taluk}},&nbsp;{{Beneficiary.benf_prmt_address_district}},
                          <br> {{Beneficiary.benf_prmt_address_state}},&nbsp;{{Beneficiary.benf_prmt_address_pincode}}
                          <br>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>13 )  Beneficiary Local Address <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_local_address_line1}},&nbsp;{{Beneficiary.benf_local_address_line2}},<br> {{Beneficiary.benf_local_address_taluk}},&nbsp;{{Beneficiary.benf_local_address_district}},
                          <br> {{Beneficiary.benf_local_address_state}},&nbsp;{{Beneficiary.benf_local_pincode}}
                          <br>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>14 ) Employer Name  <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.employer_full_name}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>15 ) Nature of Work  <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_nature_of_work}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>16 ) Date of Employment <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_date_of_employment | date}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>17 )  Wages per Day  <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_wages_per_day}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>18 ) Wages per Month <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_wages_per_month}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>19 )  Present Employer Address <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.emplr_address_line1}},&nbsp;{{Beneficiary.emplr_address_line2}},<br> {{Beneficiary.emplr_address_taluk}},&nbsp;{{Beneficiary.emplr_address_district}},
                          <br> {{Beneficiary.emplr_address_state}},&nbsp;{{Beneficiary.emplr_address_pincode}}
                          <br>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>20 ) Account Number <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_bank_account_number}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>21 ) Account Type <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_bank_account_type}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>22 ) Bank Name <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_bank_name}}
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-10 pull-left">
                        <div class="col-sm-7">
                          &nbsp;&nbsp;<b>23 ) Branch Name  <span class="pull-right WordsLeftStyle">:</span></b>
                        </div>
                        <div class="col-sm-5">
                          {{Beneficiary.benf_bank_branch}}
                        </div>
                      </div>
                    </div>
                    <br>

                  </div>
                </div>
              </div>

              <div class="panel panel-success">
                <div data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-heading cursorPointer"><b>Nomination Details</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <b>Nominee List : </b><br><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Age (years)</th>
                          <th>Date Of Birth</th>
                          <th>Share</th>
                          <th>Relationship with Applicant</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="nominee in NomineeList">
                          <td>{{ nominee.nominee_full_name }}</td>
                          <td>{{ nominee.nominee_age }}</td>
                          <td>{{ nominee.nominee_dob | date }}</td>
                          <td>{{ nominee.nominee_share }}</td>
                          <td>{{ nominee.nominee_relationship_with_benf }}</td>
                          <td>{{ nominee.nominee_address }}</td>
                        </tr>
                        <tr ng-if="NomineeList.length < 1">
                          <td colspan="5">
                            <p class="text-center" style="color:red">-- empty nominees --</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <b>Dependents List : </b><br><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Age (years)</th>
                          <th>Date Of Birth</th>
                          <th>Relation</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="dependent in DependentsList">
                          <td>{{ dependent.depnt_full_name }}</td>
                          <td>{{ dependent.depnt_age }}</td>
                          <td>{{ dependent.depnt_dob | date }}</td>
                          <td>{{ dependent.depnt_relationship_with_benf }}</td>
                          <td>{{ dependent.depnt_address }}</td>
                        </tr>
                        <tr ng-if="DependentsList.length < 1">
                          <td colspan="5">
                            <p class="text-center" style="color:red">-- empty dependents --</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="panel panel-success">
                <div data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-heading cursorPointer"><b>Employer Details</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div ng-repeat="frm in  Certificates.Forms">
                      <div class="panel-heading text-left"><b style="text-decoration: underline;">Certificate {{$index+1}}</b>
                      </div>
                      <div class="panel-body">
                        <div class="row form-group">
                          <label class="control-label col-md-2">Employer&nbsp;Full&nbsp;Name : </label>
                          <div class="col-md-4">{{frm.benf_employer_full_name}}</div>
                          <label class="control-label col-md-2">Project&nbsp;Name : </label>
                          <div class="col-md-4">{{frm.benf_present_project_name}}</div>
                        </div>
                        <div class="row form-group">
                          <label class="control-label col-md-2">Work&nbsp;Address : </label>
                          <div class="col-md-4">{{frm.benf_present_work_address}}</div>
                          <label class="control-label col-md-2">Work&nbsp;Start&nbsp;Date : </label>
                          <div class="col-md-4">{{frm.benf_work_start_date | date}}</div>
                        </div>
                        <div class="row form-group">
                          <label class="control-label col-md-2">Work&nbsp;End&nbsp;Date : </label>
                          <div class="col-md-4">{{frm.benf_work_end_date | date}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-success">
                <div data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-heading cursorPointer"><b>Payment Details</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                <div id="collapse4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="panel-body">
                      <div class="row form-group">
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Payment For<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.payment_for.entity_value}}
                        </div>
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Amount<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.amount}}
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Payment Status<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.payment_status.entity_value}}
                        </div>
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Payment Reference Id<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.payment_reference_id}}
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Payment date<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.payment_date | date }}
                        </div>
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Payment Mode<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.payment_mode.entity_value}}
                        </div>
                      </div>
                      <div class="row form-group" ng-show="BankAndPaydateFieldShow">
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Cheque / DD No<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.chequeordd_no}}
                        </div>
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b> Bank Name<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.bank_name}}
                        </div>
                      </div>
                      <div class="row form-group">
                        <div ng-show="BankAndPaydateFieldShow">
                          <div class="control-label col-sm-2">
                            &nbsp;&nbsp;<b>IFSC Code<span class="pull-right WordsLeftStyle">:</b>
                          </div>
                          <div class="col-sm-4">
                            {{Payment.ifsc_code}}
                          </div>
                        </div>
                        <div class="control-label col-sm-2">
                          &nbsp;&nbsp;<b>Remarks<span class="pull-right WordsLeftStyle">:</b>
                        </div>
                        <div class="col-sm-4">
                          {{Payment.notes}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--
                        <div class="panel panel-success">
                            <div data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-heading cursorPointer"><b>Uploaded Files</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="70%">Document Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in AllUploads">
                                            <td>{{ item }}</td>
                                            <td nowrap>
                                                <button type="button" class="btn btn-danger btn-xs" ng-click="RemoveFromList(item)">
                                                    <span class="glyphicon glyphicon-trash"></span> Remove
                                                </button>
                                            </td>
                                        </tr>
                                        <tr ng-if="AllUploads.length < 1">
                                            <td colspan="4">
                                                <p class="text-center" style="color:red"> No files uploaded </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                            -->
            </div>
            <br>
            <ul class="list-inline pull-right">
              <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
              <li><button ng-click="SubmitBeneficiary()" type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

<style type="text/css">
.grey-border {
  border: 1px dotted grey;
}
</style>
<script src="<?=$url?>web/js/references/jQuery/jquery.js"></script>