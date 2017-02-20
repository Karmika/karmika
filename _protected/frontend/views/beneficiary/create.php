<?php
use yii\helpers\Url;

$this->title = 'Register Beneficiary';
$url =  Yii::$app->homeUrl;

?>

<div class="BeneficiaryCtrl" ng-cloak ng-controller="BeneficiaryController">


<div class="row">
    <section>
    <div class="wizard">


        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Beneficiary Details">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Nominee and Dependents">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Employment Certificate">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-certificate"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Upload Files">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-upload"></i>
                        </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Review and Submit">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>


        <form role="form">
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="step1">

























    <h3 align="center">Beneficiary Details</h3>
    <hr/>

    <form class="form-vertical" name="beneficiary" role="form" novalidate ng-submit="Savedata()">
                <label class="lable-bottom-margin">Personal Details&nbsp;:&nbsp; ವೈಯಕ್ತಿಕ ವಿವರಗಳು </label><br>
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
                <div class="row form-group">
                    <label class="control-label col-md-1" for="benf_mobile_no"><span class="mandatory-field">*&nbsp;</span>Mobile&nbsp;No</label>
                    <div class="col-md-3">
                        <input digitswithplusandhyphen-only maxlength="13" class="form-control" ng-model="Beneficiary.benf_mobile_no" name="benf_mobile_no" placeholder="Enter mobile number" required />
                        <small class="error" ng-show="beneficiary.benf_mobile_no.$invalid && beneficiary.benf_mobile_no.$dirty">Please provide mobile number</small>
                    </div>

                    <label class="control-label col-md-1" for="benf_date_of_birth">Date&nbsp;of&nbsp;Birth</label>
                    <div class="col-md-3" ng-controller="DatepickerPopupController">
                        <p class="input-group">
                            <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_birth" is-open="popup1.opened" name="benf_date_of_birth" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Select date of birth" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>
                        </p>
                        <small class="error" ng-show="beneficiary.benf_date_of_birth.$invalid && beneficiary.benf_date_of_birth.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                    </div>
                    <label class="control-label col-md-1" for="benf_age"><span class="mandatory-field">*&nbsp;</span>Age</label>
                    <div class="col-md-3">
                        <input class="form-control" numerics-only ng-model="Beneficiary.beneficiary_age" name="benf_age" placeholder="Age" required />
                        <small class="error" ng-show="beneficiary.benf_age.$invalid && beneficiary.benf_age.$dirty">Please provide applicant Age</small>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-1" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Sex</label>
                    <div class="col-md-3">
                        <label ng-repeat="item in genders">
                            <input required type="radio" name="benf_sex" ng-model="Beneficiary.benf_sex" value="{{item.entity_id}}" /> {{item.entity_value}} &nbsp;&nbsp;
                        </label>
                        <small class="error" ng-show="beneficiary.benf_sex.$invalid && beneficiary.benf_sex.$dirty">Please select sex</small>
                    </div>

                    <label class="control-label col-md-1" for="nationality"><span class="mandatory-field">*&nbsp;</span>Nationality</label>
                    <div class="col-md-3">
                        <input letters-only class="form-control" ng-model="Beneficiary.nationality" name="nationality" placeholder="INDIAN" maxlength="25" required />
                        <small class="error" ng-show="beneficiary.nationality.$invalid && beneficiary.nationality.$dirty">Please provide nationality</small>
                    </div>

                    <label class="control-label col-md-1" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Caste</label>
                    <div class="col-md-3">
                        <select class="form-control" ng-options="caste.id as caste.value for caste in casteList" ng-model="Beneficiary.benf_caste"></select>
                        <small class="error" ng-show="beneficiary.benf_sex.$invalid && beneficiary.benf_sex.$dirty">Please select caste</small>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-2 stay-left" for="benf_martial_status"><span class="mandatory-field">*&nbsp;</span>Martial&nbsp;Status&nbsp;:&nbsp;</label>
                    <div class="col-md-4">
                        <label ng-repeat="item in martialStatusList">
                            <input required type="radio" name="benf_martial_status" ng-model="Beneficiary.benf_martial_status" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;
                        </label>
                        <small class="error" ng-show="beneficiary.benf_martial_status.$invalid && beneficiary.benf_martial_status.$dirty">Please select Maritial Status</small>
                    </div>

                    <label class="control-label col-md-2" for="benf_blood_group"><span class="mandatory-field">*&nbsp;</span>Blood&nbsp;Group&nbsp;:&nbsp;</label>
                    <div class="col-md-4">
                        <label ng-repeat="item in bloodGroupList">
                            <input required type="radio" name="benf_blood_group" ng-model="Beneficiary.benf_blood_group" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;
                        </label>
                        <small class="error" ng-show="beneficiary.benf_blood_group.$invalid && beneficiary.benf_blood_group.$dirty">Please select Blood Group</small>
                    </div>
                </div>

                <label class="lable-bottom-margin">Beneficiary Permanent Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ವಿಳಾಸ </label>
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
                        <input class="form-control" ng-model="Beneficiary.benf_prmt_address_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_prmt_address_pincode, 'permanent')" required />
                        <small class="error" ng-show="beneficiary.prmt_pincode.$invalid && beneficiary.prmt_pincode.$dirty">Please provide Pincode</small>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-1" for="prmt_address_line_taluk"><span class="mandatory-field">*&nbsp;</span>Taluk</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_prmt_address_taluk" name="prmt_address_line_taluk" placeholder="" required readonly="true" />
                    </div>

                    <label class="control-label col-md-1" for="address_line1"><span class="mandatory-field">*&nbsp;</span>District</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_prmt_address_district" name="address_line1" placeholder="" maxlength="25" required readonly="true" />
                    </div>

                    <label class="control-label col-md-1" for="address_line2"><span class="mandatory-field">*&nbsp;</span>State</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_prmt_address_state" name="address_line2" placeholder="" maxlength="25" required readonly="true" />
                    </div>
                </div>
                <hr>

                <p class="row">
                    <label class="col-md-6 stay-left lable-bottom-margin">Beneficiary Local Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ಸ್ಥಳೀಯ ವಿಳಾಸ</label><span class="col-md-3 col-md-offset-3 pull-right"><input type="checkbox" class="" name="" ng-change="toggleSameAsPermanentAddress()" ng-model='Benf.sameAsPermanentAddress'> Same as Permanent Address </span>
                </p>
                <div class="row form-group">
                    <label class="control-label col-md-1" for="address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_address_line1" name="address_line1" placeholder="Line 1" maxlength="25" required ng-readonly="Benf.sameAsPermanentAddress" />
                        <small class="error" ng-show="beneficiary.address_line1.$invalid && beneficiary.address_line1.$dirty">Please provide Address</small>
                    </div>

                    <label class="control-label col-md-1" for="address_line2"><span class="mandatory-field">*&nbsp;</span>Line-2</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_address_line2" name="address_line2" placeholder="Line 2" maxlength="25" ng-readonly="Benf.sameAsPermanentAddress" required />
                        <small class="error" ng-show="beneficiary.address_line2.$invalid && beneficiary.address_line2.$dirty">Please provide Address</small>
                    </div>

                    <label class="control-label col-md-1" for="pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_local_pincode, 'local')" ng-readonly="Benf.sameAsPermanentAddress" required />
                        <small class="error" ng-show="beneficiary.pincode.$invalid && beneficiary.pincode.$dirty">Please provide Pincode</small>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="control-label col-md-1" for="local_address_line1"><span class="mandatory-field">*&nbsp;</span>Taluk</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_address_taluk" name="local_address_line1" placeholder="" required readonly="true" />
                    </div>

                    <label class="control-label col-md-1" for="local_address_district"><span class="mandatory-field">*&nbsp;</span>District</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_address_district" name="local_address_district" placeholder="" maxlength="25" required readonly="true" />
                    </div>

                    <label class="control-label col-md-1" for="local_address_line_state"><span class="mandatory-field">*&nbsp;</span>State</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_local_address_state" name="local_address_line_state" placeholder="" maxlength="25" required readonly="true" />
                    </div>
                </div>

                <br>
                <hr>
                <label class="lable-bottom-margin">Name and address of Present Employer&nbsp;:&nbsp;</label>
                <div class="row form-group">
                    <label class="control-label col-md-1" for="employer_full_name"><span class="mandatory-field">*&nbsp;</span>Employer Name</label>
                    <div class="col-md-7">
                        <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.employer_full_name" name="employer_full_name" placeholder="Employer Full Name" maxlength="40" required />
                        <small class="error" ng-show="beneficiary.employer_full_name.$invalid && beneficiary.employer_full_name.$dirty">Please provide employer name</small>
                    </div>

                    <label class="control-label col-md-1" for="benf_nature_of_work"><span class="mandatory-field">*&nbsp;</span>Nature of Work</label>
                    <div class="col-md-3">
                        <select class="form-control" ng-options="caste.id as caste.value for caste in natureOfWorks" ng-model="Beneficiary.benf_nature_of_work"></select>
                        <small class="error" ng-show="beneficiary.benf_nature_of_work.$invalid && beneficiary.benf_nature_of_work.$dirty">Please select Nature of Work</small>
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
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_wages_per_day" name="benf_wages_per_day" placeholder="Wages per Day" required ng-value="" ng-change="setWagesPerMonth()" />
                        <small class="error" ng-show="beneficiary.benf_wages_per_day.$invalid && beneficiary.benf_wages_per_day.$dirty">Please provide applicant wages per day</small>
                    </div>

                    <label class="control-label col-md-1" for="benf_wages_per_month"><span class="mandatory-field">*&nbsp;</span>Wages per&nbsp;Month</label>
                    <div class="col-md-3">
                        <input class="form-control" ng-model="Beneficiary.benf_wages_per_month" name="benf_wages_per_month" placeholder="Wages per Month" ng-change="setWagesPerDay()" required />
                        <small class="error" ng-show="beneficiary.benf_wages_per_month.$invalid && beneficiary.benf_wages_per_month.$dirty">Please provide applicant Age</small>
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
                        <input class="form-control" ng-model="Beneficiary.emplr_address_line2" name="address_line2" placeholder="Line 2" maxlength="25" required />
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
                        <input class="form-control" ng-model="Beneficiary.emplr_address_taluk" name="emplr_address_taluk" placeholder="" required readonly="true" />
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
                <!-- BANK Details -->
                <hr>
                <label class="lable-bottom-margin">Bank Details &nbsp;:&nbsp; </label>
                <div class="row form-group">
                  <label class="control-label col-md-1" for="benf_bank_account_number"><span class="mandatory-field">*&nbsp;</span>Account Number</label>
                    <div class="col-md-3">
                        <input class="form-control" numerics-only ng-model="Beneficiary.benf_bank_account_number" name="benf_bank_account_number" placeholder="Account Number" maxlength=15 required />
                        <small class="error" ng-show="beneficiary.benf_bank_account_number.$invalid && beneficiary.benf_bank_account_number.$dirty">Please provide bank account Number</small>
                    </div>

                <label class="control-label col-md-1" for="benf_bank_name"><span class="mandatory-field">*&nbsp;</span>Bank </label>
                    <div class="col-md-3">
                        <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_name" name="benf_bank_name" placeholder="Bank Name" maxlength="25" required />
                        <small class="error" ng-show="beneficiary.benf_bank_name.$invalid && beneficiary.benf_bank_name.$dirty">Please provide Bank name</small>
                    </div>

                  <label class="control-label col-md-1" for="benf_bank_branch"><span class="mandatory-field">*&nbsp;</span>Branch </label>
                    <div class="col-md-3">
                        <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_branch" name="benf_bank_branch" placeholder="bacnk branch Name" maxlength="25" required />
                        <small class="error" ng-show="beneficiary.benf_bank_branch.$invalid && beneficiary.benf_bank_branch.$dirty">Please provide Bank Branch name</small>
                    </div>
                </div>
                <hr>
<!--                 <div class="form-group pull-right">
                    <div class="col-sm-12">
                        <button onclick="this.disabled=true;" ng-disabled="beneficiary.$invalid" type="button" ng-click="Savedata()" class="btn btn-success">Save</button>
                        <button type="button" ng-click="Back()" class="btn btn-success">Back</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div> -->
                <button ng-disabled="beneficiary.$invalid" type="button" ng-click="Savedata()" class="btn btn-primary next-step pull-right">Save and continue</button>
    </form>






















                </div>

                <div class="tab-pane" role="tabpanel" id="step2">

                    <h3 align="center">Nominee and Dependents</h3>
                    <hr/>

                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                    </ul>

                </div>

                <div class="tab-pane" role="tabpanel" id="step3">

                    <h3 align="center">Employment Certificate</h3>
                    <hr/>

                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                    </ul>
                </div>

<!--   tab 4    tab 4    tab 4    tab 4    tab 4    tab 4    tab 4    tab 4    tab 4    tab 4    tab 4  -->
       
                <div class="tab-pane" role="tabpanel" id="step4">

                    <h3 align="center">Upload Files</h3>
                    <hr/>
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 40px">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50%">Document Name</th>
                                            <th ng-show="uploader.isHTML5">Size</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in uploader.queue">
                                            <td>{{ item.file.name }}</td>
                                            <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
                                            <td nowrap>
                                                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                                                    <span class="glyphicon glyphicon-trash"></span> Remove
                                                </button>
                                            </td>
                                        </tr>
                                        <tr ng-if="uploader.queue.length < 1">
                                            <td colspan="4"><p class="text-center" style="color:red">-- Please upload your files here --</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row"  style="padding-left:1.5%">
                            <!-- <input class="btn btn-success" type="file" nv-file-select="" uploader="uploader" multiple  /><br/> -->
                            <label class="btn btn-success btn-file">
                                Browse <input  type="file" nv-file-select="" uploader="uploader" multiple hidden>
                            </label>
                        </div>
                  
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button ng-click="UploadFiles()" type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                </div>

<!--   Last Tab   Last Tab   Last Tab   Last Tab   Last Tab   Last Tab   Last Tab   Last Tab   Last Tab   -->
                
                <div class="tab-pane" role="tabpanel" id="complete">

                    <h3 align="center">Preview and Submit</h3>
                    <hr/>

                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save As Draft</button></li>
                        <li><button ng-click="print()" type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</section>
</div>

</div>


<script src="<?=$url?>web/js/references/jQuery/jquery.js"></script>