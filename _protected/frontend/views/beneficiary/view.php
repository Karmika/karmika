<?php
    $this->title = 'Beneficiary Details';
?>
<div class="beneficiaryCtrl" ng-cloak ng-controller="BeneficiaryDetailsController">

<div class="panel panel-success">
    <div data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-heading cursorPointer">Beneficiary Full Details<span class="pull-right">Acknowledgement Number&nbsp;:&nbsp;<b>{{Beneficiary.benf_acknowledgement_number}}</b></span></div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        <h3 class="text-center subHeading">Beneficiary Personal Details </h3><br>
        
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

        <br><h3 class="text-center subHeading">Nominee and Dependents</h3><br>


        <br><h3 class="text-center subHeading">Employment Certificate</h3><br>


        <br><h3 class="text-center subHeading">Uploaded Files</h3><br>

        <br>
        <br>
		<div class="row" ng-show="!Beneficiary.actionRequired">
			<div class="col-sm-3">
			    &nbsp;&nbsp;<b style="color:green;font-size:18px;">Admin Comments  <span class="pull-right WordsLeftStyle">:</b>
			</div>
			<div class="col-sm-9">
			    {{Beneficiary.admin_comments}}
			</div>
		</div>

	    <form class="form-vertical" name="Admin" role="form" novalidate ng-show="Beneficiary.actionRequired">
			<div class="form-group">
				<label for="comment">Comments :</label>
				<textarea ng-model="adminComments" name="adminComments" class="form-control" rows="3" id="adminComments" required ></textarea>
				<small class="error" ng-show="Admin.adminComments.$invalid && Admin.adminComments.$dirty">Please provide comments</small>
			</div>
			<ul class="list-inline pull-right">
			  <li><button ng-click="Approve()" type="button" class="btn btn-success next-step">Approve</button></li>
			  <li><button ng-disabled="Admin.$invalid" ng-click="Reject()" type="button" class="btn btn-danger prev-step">Reject</button></li>
			</ul>
		</form>
      </div>    
    </div>    
  </div>

</div>