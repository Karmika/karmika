<?php
use yii\helpers\Url;

$this->title = 'Register Beneficiary';
$url =  Yii::$app->homeUrl;

?>
<style type="text/css">
    .col-sm-2{
        padding-left: 0px;
    }
    .lable-bottom-margin{
        margin-bottom:20px;
    }
</style>

<div class="beneficiaryCtrl" ng-cloak ng-controller="BeneficiaryController">


                <div class="tab-pane" role="tabpanel" id="complete">
                    
                    <h3 class="text-center"><u>Review and Submit</u></h3>
                    <br />
                    <br />

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
                                        {{Beneficiary.benf_prmt_address_line1}},&nbsp;{{Beneficiary.benf_prmt_address_line2}},<br>
                                        {{Beneficiary.benf_prmt_address_taluk}},&nbsp;{{Beneficiary.benf_prmt_address_district}},<br>
                                        {{Beneficiary.benf_prmt_address_state}},&nbsp;{{Beneficiary.benf_prmt_address_pincode}}<br> 
                                    </div>
                                  </div>
                                <br>
                                  <div class="row">
                                    <div class="col-sm-6">
                                        &nbsp;&nbsp;<b>13 )  Beneficiary Local Address <span class="pull-right WordsLeftStyle">:</b>
                                    </div>
                                    <div class="col-sm-6">
                                        {{Beneficiary.benf_local_address_line1}},&nbsp;{{Beneficiary.benf_local_address_line2}},<br>
                                        {{Beneficiary.benf_local_address_taluk}},&nbsp;{{Beneficiary.benf_local_address_district}},<br>
                                        {{Beneficiary.benf_local_address_state}},&nbsp;{{Beneficiary.benf_local_pincode}}<br> 
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
                                        {{Beneficiary.emplr_address_line1}},&nbsp;{{Beneficiary.emplr_address_line2}},<br>
                                        {{Beneficiary.emplr_address_taluk}},&nbsp;{{Beneficiary.emplr_address_district}},<br>
                                        {{Beneficiary.emplr_address_state}},&nbsp;{{Beneficiary.emplr_address_pincode}}<br> 
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
                                        &nbsp;&nbsp;<b>21 )  Bank Name  <span class="pull-right WordsLeftStyle">:</b>
                                    </div>
                                    <div class="col-sm-6">
                                        {{Beneficiary.benf_bank_name}}
                                    </div>
                                  </div>
                                <br>
                                  <div class="row">
                                    <div class="col-sm-6">
                                        &nbsp;&nbsp;<b>22 ) Branch Name  <span class="pull-right WordsLeftStyle">:</b>
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
                        <!-- <li><button type="button" class="btn btn-primary btn-info-full next-step">Save</button></li> -->
                        <li><button ng-click="print()" type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>


</div>

<script src="<?=$url?>web/js/references/jQuery/jquery.js"></script>