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
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Beneficiary Details"><span class="round-tab"><i class="glyphicon glyphicon-user"> Beneficiary Form</i></span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Nominee and Dependents"><span class="round-tab"><i class="glyphicon glyphicon-user"></i> Nominee and Dependents</span>
                            </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Employment Certificate"><span class="round-tab"><i class="glyphicon glyphicon-certificate"></i> Employment Certificate</span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Upload Files"><span class="round-tab"><i class="glyphicon glyphicon-upload"></i></span> Upload Files</a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Preview and Submit"><span class="round-tab"><i class="glyphicon glyphicon-ok"></i> Preview and Submit</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div role="">
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
                                        <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_birth" is-open="popup1.opened" name="benf_date_of_birth" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats"
                                            placeholder="Select date of birth" />
                                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                                    </p>
                                    <small class="error" ng-show="beneficiary.benf_date_of_birth.$invalid && beneficiary.benf_date_of_birth.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                                </div>
                                <label class="control-label col-md-1" for="benf_age"><span class="mandatory-field">*&nbsp;</span>Age</label>
                                <div class="col-md-3">
                                    <input class="form-control" numerics-only ng-model="Beneficiary.beneficiary_age" name="benf_age" placeholder="Age" ng-change ="setUnknownDOBbyAge('',Beneficiary.beneficiary_age,'Beneficiary')" required />
                                    <small class="error" ng-show="beneficiary.benf_age.$invalid && beneficiary.benf_age.$dirty">Please provide applicant Age</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-1" for="benf_sex"><span class="mandatory-field">*&nbsp;</span>Sex</label>
                                <div class="col-md-3">
                                    <label ng-repeat="item in genders"><input required type="radio" name="benf_sex" ng-model="Beneficiary.benf_sex" value="{{item.entity_id}}" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                                    <small class="error" ng-show="beneficiary.benf_sex.$invalid && beneficiary.benf_sex.$dirty">Please select sex</small>
                                </div>

                                <label class="control-label col-md-1" for="nationality"><span class="mandatory-field">*&nbsp;</span>Nationality</label>
                                <div class="col-md-3">
                                    <input letters-only class="form-control" ng-model="Beneficiary.nationality" name="nationality" placeholder="INDIAN" maxlength="25" required />
                                    <small class="error" ng-show="beneficiary.nationality.$invalid && beneficiary.nationality.$dirty">Please provide nationality</small>
                                </div>

                                <label class="control-label col-md-1" for="benf_caste"><span class="mandatory-field">*&nbsp;</span>Caste</label>
                                <div class="col-md-3">
                                    <select class="form-control" ng-options="caste.id as caste.value for caste in casteList" ng-model="Beneficiary.benf_caste"></select>
                                    <small class="error" ng-show="beneficiary.benf_caste.$invalid && beneficiary.benf_caste.$dirty">Please select caste</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-2 stay-left" for="benf_martial_status"><span class="mandatory-field">*&nbsp;</span>Martial&nbsp;Status&nbsp;:&nbsp;</label>
                                <div class="col-md-4">
                                    <label ng-repeat="item in martialStatusList"><input required type="radio" name="benf_martial_status" ng-model="Beneficiary.benf_martial_status" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                                    <small class="error" ng-show="beneficiary.benf_martial_status.$invalid && beneficiary.benf_martial_status.$dirty">Please select Maritial Status</small>
                                </div>

                                <label class="control-label col-md-2" for="benf_blood_group"><span class="mandatory-field">*&nbsp;</span>Blood&nbsp;Group&nbsp;:&nbsp;</label>
                                <div class="col-md-4">
                                    <label ng-repeat="item in bloodGroupList"><input required type="radio" name="benf_blood_group" ng-model="Beneficiary.benf_blood_group" value="{{item.entity_id}}" class="" /> {{item.entity_value}} &nbsp;&nbsp;</label>
                                    <small class="error" ng-show="beneficiary.benf_blood_group.$invalid && beneficiary.benf_blood_group.$dirty">Please select Blood Group</small>
                                </div>
                            </div>

                            <label class="lable-bottom-margin">Beneficiary Permanent Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ವಿಳಾಸ </label>
                            <div class="row form-group">
                                <label class="control-label col-md-1" for="permanent_address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
                                <div class="col-md-3">
                                    <textarea class="form-control" ng-model="Beneficiary.benf_prmt_address_line1" name="permanent_address_line1" placeholder="Line 1" maxlength="175" ng-change='setSameLocalIfTrue("line1")' required ></textarea>
                                    <small class="error" ng-show="beneficiary.permanent_address_line1.$invalid && beneficiary.permanent_address_line1.$dirty">Please provide Address</small>
                                </div>

                                <label class="control-label col-md-1" for="prmt_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
                                <div class="col-md-3">
                                    <input class="form-control" ng-model="Beneficiary.benf_prmt_address_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_prmt_address_pincode, 'permanent')" required />
                                    <small class="error" ng-show="beneficiary.prmt_pincode.$invalid && beneficiary.prmt_pincode.$dirty">Please provide Pincode</small>
                                </div>

                                <label class="control-label col-md-1" for="permanent_address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit</label>
                                <div class="col-md-3">
                                    <select class="form-control" ng-model="Beneficiary.benf_prmt_address_line2" ng-options="officeName for officeName in Beneficiary.benf_prmt_address_OfficeList" name='permanent_address_line2' ng-change='setSameLocalIfTrue("line2")' ng-readonly="Beneficiary.benf_prmt_address_OfficeList.length==0" name="permanent_address_line2"></select>
                                    <small class="error" ng-show="beneficiary.permanent_address_line2.$invalid && beneficiary.permanent_address_line2.$dirty">Please provide Address</small>
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
                            <hr/>
                            <p class="row">
                                <label class="col-md-6 stay-left lable-bottom-margin">Beneficiary Local Address&nbsp;:&nbsp; ಆರ್ಜಿದಾರರ ಸ್ಥಳೀಯ ವಿಳಾಸ</label><span class="col-md-3 col-md-offset-3 pull-right"><input type="checkbox" class="" name="" ng-change="toggleSameAsPermanentAddress()" ng-model='Benf.sameAsPermanentAddress'> Same as Permanent Address </span>
                            </p>
                            <div class="row form-group">
                                <label class="control-label col-md-1" for="address_line1"><span class="mandatory-field">*&nbsp;</span>Line-1</label>
                                <div class="col-md-3">
                                    <textarea class="form-control" ng-model="Beneficiary.benf_local_address_line1" name="address_line1" placeholder="Line 1" maxlength="175" required ng-readonly="Benf.sameAsPermanentAddress"></textarea>
                                    <small class="error" ng-show="beneficiary.address_line1.$invalid && beneficiary.address_line1.$dirty">Please provide Address</small>
                                </div>

                                <label class="control-label col-md-1" for="pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
                                <div class="col-md-3">
                                    <input class="form-control" ng-model="Beneficiary.benf_local_pincode" name="pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.benf_local_pincode, 'local')" ng-readonly="Benf.sameAsPermanentAddress"
                                        required />
                                    <small class="error" ng-show="beneficiary.pincode.$invalid && beneficiary.pincode.$dirty">Please provide Pincode</small>
                                </div>

                                <label class="control-label col-md-1" for="address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit</label>
                                <div class="col-md-3">
                                    <select class="form-control" ng-model="Beneficiary.benf_local_address_line2" ng-options="officeName for officeName in Beneficiary.benf_local_address_OfficeList" ng-readonly="Benf.sameAsPermanentAddress"></select>
                                    <small class="error" ng-show="beneficiary.address_line2.$invalid && beneficiary.address_line2.$dirty">Please provide Address</small>
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
                                        <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="Beneficiary.benf_date_of_employment" is-open="popup1.opened" name="benf_date_of_employment" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats"
                                            placeholder="Employment Date" />
                                        <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
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
                                    <textarea class="form-control" ng-model="Beneficiary.emplr_address_line1" name="emplr_address_line1" placeholder="Line 1" maxlength="175" required></textarea>
                                    <small class="error" ng-show="beneficiary.emplr_address_line1.$invalid && beneficiary.emplr_address_line1.$dirty">Please provide Address</small>
                                </div>

                                <label class="control-label col-md-1" for="emplr_address_pincode"><span class="mandatory-field">*&nbsp;</span>Pincode</label>
                                <div class="col-md-3">
                                    <input class="form-control" ng-model="Beneficiary.emplr_address_pincode" name="emplr_address_pincode" placeholder="Pincode" min='110001' max='999999' numerics-only ng-change="getPostalData(Beneficiary.emplr_address_pincode, 'employer')" required />
                                    <small class="error" ng-show="beneficiary.emplr_address_pincode.$invalid && beneficiary.emplr_address_pincode.$dirty">Please provide Pincode</small>
                                </div>

                                <label class="control-label col-md-1" for="emplr_address_line2"><span class="mandatory-field">*&nbsp;</span>Postal&nbsp;Limit</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="address_line2" ng-model="Beneficiary.emplr_address_line2" ng-options="officeName for officeName in Beneficiary.emplr_address_OfficeList" ng-readonly="Beneficiary.emplr_address_OfficeList.length==0"></select>
                                    <small class="error" ng-show="beneficiary.emplr_address_line2.$invalid && beneficiary.emplr_address_line2.$dirty">Please provide Address</small>
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
                            <hr/>
                            <label class="lable-bottom-margin">Bank Details &nbsp;:&nbsp; </label>
                            <div class="row form-group">
                                <label class="control-label col-md-1" for="benf_bank_account_number"><span class="mandatory-field">*&nbsp;</span>Account Number</label>
                                <div class="col-md-3">
                                    <input class="form-control" numerics-only ng-model="Beneficiary.benf_bank_account_number" name="benf_bank_account_number" placeholder="Account Number" maxlength=15 required />
                                    <small class="error" ng-show="beneficiary.benf_bank_account_number.$invalid && beneficiary.benf_bank_account_number.$dirty">Please provide bank account Number</small>
                                </div>

                                <label class="control-label col-md-1" for="benf_bank_account_type"><span class="mandatory-field">*&nbsp;</span>Account Type</label>
                                <div class="col-md-3">
                                    <select class="form-control" ng-options="type.id as type.value for type in accountTypeList" ng-model="Beneficiary.benf_bank_account_type"></select>
                                    <small class="error" ng-show="beneficiary.benf_bank_account_type.$invalid && beneficiary.benf_bank_account_type.$dirty">Please provide bank account type</small>
                                </div>

                                <label class="control-label col-md-1" for="benf_bank_name"><span class="mandatory-field">*&nbsp;</span>Bank </label>
                                <div class="col-md-3">
                                    <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_name" name="benf_bank_name" placeholder="Bank Name" maxlength="25" required />
                                    <small class="error" ng-show="beneficiary.benf_bank_name.$invalid && beneficiary.benf_bank_name.$dirty">Please provide Bank name</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="control-label col-md-1" for="benf_bank_branch"><span class="mandatory-field">*&nbsp;</span>Branch </label>
                                <div class="col-md-3">
                                    <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model="Beneficiary.benf_bank_branch" name="benf_bank_branch" placeholder="bacnk branch Name" maxlength="25" required />
                                    <small class="error" ng-show="beneficiary.benf_bank_branch.$invalid && beneficiary.benf_bank_branch.$dirty">Please provide Bank Branch name</small>
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group pull-right">
                                <div class="col-sm-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-success next-step" ng-disabled="beneficiary.$invalid || form1submitted" ng-click="Savedata()">Save and continue</button>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3 align="center">Nominee and Dependents</h3>
                        <hr/>

                        <h4>Nominee List</h4>
                        <div class="row" style="text-align:center;">
                            <div class="col-md-3">
                                <label>Nominee Full Name<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-3">
                                <label>Nominee Address<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-2">
                                <label>DOB</label>
                            </div>
                            <div class="col-md-1">
                                <label>Age<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-1">
                                <label>% Share<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-2">
                                <label>Edit</label>
                            </div>
                        </div>
                        <form role='form' name="NomineeForm" novalidate class="form-vertical table table-bordered table-compressed">
                        <div class="row" ng-repeat="nominee in NomineeList" style="margin:0.5rem;">
                            <div class="col-md-3">
                                <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model='nominee.nominee_full_name' name="NomineeForm.fullname+$index" placeholder="Full Name"  maxlength="100" required />
                                <small class="error" ng-show='!nominee.nominee_full_name'>Please provide nominee name</small>
                            </div>
                            <div class="col-md-3">
                                <textarea name='NomineeForm.nominee_address{{$index}}' class="form-control" ng-model='nominee.nominee_address' required></textarea>
                                <small class="error" ng-show="!nominee.nominee_address">Please provide nominee address</small>
                            </div>
                            <div class="col-md-2">
                                <p class="input-group" ng-controller="DatepickerPopupController">
                                    <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="nominee.nominee_dob" is-open="popup1.opened" name="NomineeForm.nominee_dob" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Date of Birth" ng-change="calculateAgeForNominee($index)"/>
                                    <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                                </p>
                                <small class="error" ng-show="NomineeForm.nominee_dob.$invalid && NomineeForm.nominee_dob.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" numerics-only ng-model="nominee.nominee_age" name="NomineeForm.nominee_age" placeholder="Age" ng-change="setUnknownDOBbyAge($index,nominee.nominee_age,'Nominee')" required />
                                <small class="error" ng-show="NomineeForm.nominee_age.$invalid && NomineeForm.nominee_age.$dirty">Please provide nominee Age</small>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" numerics-only ng-model="nominee.nominee_share" name="NomineeForm.nominee_share" placeholder="% share" ng-change='changedPercentage($index)' required />
                                <small class="error" ng-show="NomineeForm.nominee_share.$invalid && NomineeForm.nominee_share.$dirty">Please provide percentage share</small>
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <button class="btn btn-default" ng-click="insertNominee($index)"><i class="glyphicon glyphicon-user"></i></button>
                                <button class="btn btn-danger" ng-click="deleteNominee()" ng-show='NomineeList.length>1'><i class="glyphicon glyphicon-remove"></i></button>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-success btn-info-full next-step" ng-disabled="NomineeForm.$invalid" >Save and continue</button></li>
                        </ul>
                        </form>


                        <!-- HELP -->
                        <h4>Dependents List</h4>
                        <div class="row" style="text-align:center;">
                            <div class="col-md-3">
                                <label>Dependent Full Name<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-3">
                                <label>Dependent Address<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-2">
                                <label>DOB</label>
                            </div>
                            <div class="col-md-1">
                                <label>Age<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-1">
                                <label>Relation with Beneficiary<span class="mandatory-field">*&nbsp;</span></label>
                            </div>
                            <div class="col-md-2">
                                <label>Edit</label>
                            </div>
                        </div>
                        <form role='form' name="DependentForm" novalidate class="form-vertical table table-bordered table-compressed">
                        <div class="row" ng-repeat="dependent in DependentsList" style="margin:0.5rem;">
                            <div class="col-md-3">
                                <input letterswithsinglequoteandhyphendot-only class="form-control" ng-model='dependent.depnt_full_name' name="DependentForm.depnt_full_name+$index" placeholder="Full Name"  maxlength="100" required />
                                <small class="error" ng-show='!dependent.depnt_full_name'>Please provide dependent name</small>
                            </div>
                            <div class="col-md-3">
                                <textarea name='DependentForm.depnt_address{{$index}}' class="form-control" ng-model='dependent.depnt_address' required></textarea>
                                <small class="error" ng-show="!dependent.depnt_address">Please provide dependent address</small>
                            </div>

                            <!-- TO BE DONE -->
                            <div class="col-md-2">
                                <p class="input-group" ng-controller="DatepickerPopupController">
                                    <input date-validation class="form-control" uib-datepicker-popup="{{format}}" ng-model="nominee.nominee_dob" is-open="popup1.opened" name="DependentForm.nominee_dob" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="Date of Birth" ng-change="calculateAgeForNominee($index)"/>
                                    <span class="input-group-btn"><button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button></span>
                                </p>
                                <small class="error" ng-show="DependentForm.nominee_dob.$invalid && DependentForm.nominee_dob.$dirty">Please provide date of birth and only acceptable format is DD-MM-YYYY</small>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" numerics-only ng-model="nominee.nominee_age" name="DependentForm.nominee_age" placeholder="Age" ng-change="setUnknownDOBbyAge($index,nominee.nominee_age,'Nominee')" required />
                                <small class="error" ng-show="DependentForm.nominee_age.$invalid && DependentForm.nominee_age.$dirty">Please provide nominee Age</small>
                            </div>
                            <div class="col-md-1">
                                <input class="form-control" numerics-only ng-model="nominee.nominee_share" name="DependentForm.nominee_share" placeholder="% share" ng-change='changedPercentage($index)' required />
                                <small class="error" ng-show="DependentForm.nominee_share.$invalid && DependentForm.nominee_share.$dirty">Please provide percentage share</small>
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <button class="btn btn-default" ng-click="insertNominee($index)"><i class="glyphicon glyphicon-user"></i></button>
                                <button class="btn btn-danger" ng-click="deleteNominee()" ng-show='NomineeList.length>1'><i class="glyphicon glyphicon-remove"></i></button>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-success btn-info-full next-step" ng-disabled="DependentForm.$invalid" >Save and continue</button></li>
                        </ul>
                        </form>
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
                                            <td colspan="4">
                                                <p class="text-center" style="color:red">-- Please upload your files here --</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row" style="padding-left:1.5%">
                            <!-- <input class="btn btn-success" type="file" nv-file-select="" uploader="uploader" multiple  /><br/> -->
                            <label class="btn btn-success btn-file">Browse <input  type="file" nv-file-select="" uploader="uploader" multiple hidden></label>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button ng-click="UploadFiles()" type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3 align="center">Preview and Submit</h3>
                        <hr/>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-success">
                                <div data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-heading cursorPointer"><b>Beneficiary Personal Details</b><span class="glyphicon glyphicon-sort pull-right"></span></div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>1) First Name <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_first_name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>2) Middle Name <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_middle_name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>3) Last Name <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_last_name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>4 ) Date Of Birth <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_date_of_birth | date }}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>5) Age <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.beneficiary_age}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>6 )   Sex   <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_sex}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>7 )  Nationality <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.nationality}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>8 )  Caste <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_caste}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>9 ) Martial Status  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_martial_status}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>10 )  Blood Group <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_blood_group}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>11 )  Mobile No  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_mobile_no}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>12 )  Beneficiary Permanent Address <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_prmt_address_line1}},&nbsp;{{Beneficiary.benf_prmt_address_line2}},<br> {{Beneficiary.benf_prmt_address_taluk}},&nbsp;{{Beneficiary.benf_prmt_address_district}},
                                                <br> {{Beneficiary.benf_prmt_address_state}},&nbsp;{{Beneficiary.benf_prmt_address_pincode}}
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>13 )  Beneficiary Local Address <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_local_address_line1}},&nbsp;{{Beneficiary.benf_local_address_line2}},<br> {{Beneficiary.benf_local_address_taluk}},&nbsp;{{Beneficiary.benf_local_address_district}},
                                                <br> {{Beneficiary.benf_local_address_state}},&nbsp;{{Beneficiary.benf_local_pincode}}
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>14 )  Employer Name  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.employer_full_name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>15 )  Nature of Work  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_nature_of_work}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>16 )  Date of Employment  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_date_of_employment | date}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>17 )  Wages per Day  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_wages_per_day}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>18 )  Wages per Month  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_wages_per_month}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>19 )  Present Employer Address <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.emplr_address_line1}},&nbsp;{{Beneficiary.emplr_address_line2}},<br> {{Beneficiary.emplr_address_taluk}},&nbsp;{{Beneficiary.emplr_address_district}},
                                                <br> {{Beneficiary.emplr_address_state}},&nbsp;{{Beneficiary.emplr_address_pincode}}
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>20 )  Account Number  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_bank_account_number}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>21 )  Account Type  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_bank_account_type}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>22 )  Bank Name  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_bank_name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                &nbsp;&nbsp;<b>23 ) Branch Name  <span class="pull-right WordsLeftStyle">:</b>
                                            </div>
                                            <div class="col-sm-6">
                                                {{Beneficiary.benf_bank_branch}}
                                            </div>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-heading cursorPointer">Nominee and Dependents<span class="glyphicon glyphicon-sort pull-right"></span></div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">


                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-heading cursorPointer">Employment Certificate<span class="glyphicon glyphicon-sort pull-right"></span></div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">


                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-heading cursorPointer">Uploaded Files<span class="glyphicon glyphicon-sort pull-right"></span></div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table" style="margin-bottom:0px;">
                                            <tbody>
                                                <tr>
                                                    <th ng-repeat="header in UploadHeaders">{{header.name}}</th>
                                                </tr>
                                                <tr ng-repeat="item in AllUploads">
                                                    <td>{{item.order}}</td>
                                                    <td>{{item.Actions}}</td>
                                                    <td>{{item.file}}</td>
                                                    <td>{{item.designation}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save As Draft</button></li>
                            <li><button ng-click="print()" type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
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
    body {
        /*font-size: 12px;*/
    }
</style>
<script src="<?=$url?>web/js/references/jQuery/jquery.js"></script>