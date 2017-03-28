<?php
    $this->title = 'Beneficiary Details';
?>
<div class="beneficiaryCtrl" ng-cloak ng-controller="BeneficiaryDetailsController" style="background-color: #ffffff;">

<div id='printId'>
  <center>
    <h4>ನಮೂನೆ-5 &nbsp; FORM-V</h4>
    <p>[ನಿಯಮ 20ರ ಉಪನಿಯಮ (1)] &nbsp; [Sec sub-rule (1) or Rule 20]</p>
    <p><b>ಫಲಾನುಭವಿ ಎಂದು  ನೋಂದಾಯಿಸುವ ಅರ್ಜಿ</b>
    <b>Application for Registration as a Beneficiary</b></p>
  </center>
  <div class="row">
    <div class="col-md-7 col-md-offset-1">
      <p>ಗೆ/TO</p>
      <p>ಫಲಾನುಭವಿ ನೋಂದಣಾಧಿಕಾರಿ/Beneficiary Registration officer</p>
      <p>(ಕಾರ್ಮಿಕ ಅಧಿಕಾರಿ/ಹಿರಿಯ ಕಾರ್ಮಿಕ ನಿರೀಕ್ಷಕರು/ಕಾರ್ಮಿಕ ನಿರೀಕ್ಷಕರು)</p>
      <p>(Labour Officer/Senior Labour Inspector/ Labour Inspector) ವಿಳಾಸ/Address:</p>
    </div>
    <div class="col-md-4">
      <img class="ProfilePicPreview img-responsive" ng-src="{{defaultPic}}"  alt="Applicant image" height="150px;" width="100px"/>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1" style="page-break-after: always;">
      <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td rowspan="2" valign="top">
              <p>1</p>
            </td>
            <td valign="top">
              <p>i) ಅರ್ಜಿದಾರನ ಪೂರ್ಣ ಹೆಸರು ಮತ್ತು ಖಾಯಂ ವಿಳಾಸ</p>

              <p>Full name of the Applicant:</p>

              <p>and</p>

              <p>Permanent address of the applicant:</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_first_name}} {{Beneficiary.benf_middle_name}} {{Beneficiary.benf_last_name}}</p>
              <p>{{Beneficiary.benf_prmt_address_line1}},&nbsp;{{Beneficiary.benf_prmt_address_line2}},<br> {{Beneficiary.benf_prmt_address_taluk}},&nbsp;{{Beneficiary.benf_prmt_address_district}},
                <br> {{Beneficiary.benf_prmt_address_state}},&nbsp;{{Beneficiary.benf_prmt_address_pincode}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>ii) ಮೊಬೈಲ್ ನಂಬರ್/Mobile No.</p>
            </td>
            <td valign="top">
              {{Beneficiary.benf_mobile_no}}
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>2</p>
            </td>
            <td valign="top">
              <p>ಹುಟ್ಟಿದ ದಿನಾಂಕ/ವಯಸ್ಸು/Date of Birth/Age</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_date_of_birth | date }}</p>
              <p>( {{Beneficiary.beneficiary_age}} ) years </p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>3</p>
            </td>
            <td valign="top">
              <p>ಲಿಂಗ/Sex</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_sex}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>4</p>
            </td>
            <td valign="top">
              <p>ರಾಷ್ಟ್ರೀಯತೆ/Nationality</p>
            </td>
            <td valign="top">
              {{Beneficiary.nationality}}
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>5</p>
            </td>
            <td valign="top">
              <p>ಇವುಗಳಿಗೆ ಸೇರಿದ್ದಾರೆಯೇ</p>
              <p>Whether belongs to</p>
            </td>
            <td valign="top">
              <p>ಪರಿಶಿಷ್ಟಜಾತಿ (ಎಸ್.ಸಿ) / ಪರಿಶಿಷ್ಟ ಪಂಗಡ (ಎಸ್.ಟಿ) / ಇತರೆ ಹಿಂದುಳಿದ ಜಾತಿ (ಓ.ಬಿ.ಸಿ) /ಇತರೆ SC/ST/OBC/Others</p>
              <p><b>{{Beneficiary.benf_caste}}</b></p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>6</p>
            </td>
            <td valign="top">
              <p>ಸ್ಥಳೀಯ ವಿಳಾಸ/Local Address</p>
            </td>
            <td valign="top">
              <p> {{Beneficiary.benf_local_address_line1}},&nbsp;{{Beneficiary.benf_local_address_line2}}, <br> {{Beneficiary.benf_local_address_taluk}},&nbsp;{{Beneficiary.benf_local_address_district}},
              <br>{{Beneficiary.benf_local_address_state}},&nbsp;{{Beneficiary.benf_local_pincode}}
              </p>
              </td>
          </tr>
          <tr>
            <td valign="top">
              <p>7</p>
            </td>
            <td valign="top">
              <p>ಹಾಲಿ ನಿಯೋಜಕರ ಹೆಸರು ಮತ್ತು ವಿಳಾಸ </p>

              <p>Name and Address of the present employer</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.employer_full_name}}</p>
              <p>{{Beneficiary.emplr_address_line1}},&nbsp;{{Beneficiary.emplr_address_line2}},<br> {{Beneficiary.emplr_address_taluk}},&nbsp;{{Beneficiary.emplr_address_district}},
              <br> {{Beneficiary.emplr_address_state}},&nbsp;{{Beneficiary.emplr_address_pincode}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>8</p>
            </td>
            <td valign="top">
              <p>ಕೆಲಸದ ಸ್ವರೂಪ:</p>
              <p>Nature of work:</p>
              <!-- <p>ಕೆಲಸದ ಸ್ವರೂಪ: ಸೂಕ್ತವಾದುದ್ದನ್ನು ಗುರುತಿಸಿ (√)</p>
              <p>Nature of work: Tick the appropriate one (√)</p> -->
            </td>
            <td valign="top">
              <!-- <p>ಗಾರೆ ಕೆಲಸ/ಬಾರ್ ಬೆಡಿಂಗ್/ಮರಗೆಲಸ/ಎಲೆಕ್ಟ್ರಿಷಿಯನ್/ ಸೆಟ್ರಿಂಗ್/ ಹೆಲ್ಪರ್/ಪ್ಲಬಿಂಗ್/ಇತರೆ</p>
              <p>Mason/Barbending/Carpentry/Electrician/ Centering/</p>
              <p>Helper/Plumbing/Others </p> -->
              <p>{{Beneficiary.benf_nature_of_work}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>9</p>
            </td>
            <td valign="top">
              <p>ಉದ್ಯೋಗಕ್ಕೆ ಸೇರಿದ ದಿನಾಂಕ / Date of employment</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_date_of_employment | date}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>10</p>
            </td>
            <td valign="top">
              <p>ವೇತನ ದಿನ ಒಂದಕ್ಕೆ/ ಪ್ರತಿ ತಿಂಗಳಿಗೆ</p>
              <p>Wages per day/ per month</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_wages_per_day}} / {{Beneficiary.benf_wages_per_month}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>11</p>
            </td>
            <td valign="top">
              <p>ವೈವಾಹಿಕ ಸ್ಥಿತಿ/ Martial Status </p>
              <!-- <p>ನಾಮನಿರ್ದೇಶಿತರ ಹೆಸರು, ಸಂಬಂಧ ಮತ್ತು ವಿಳಾಸ/ Name of the Nominee, Relation and Address</p> -->
            </td>
            <td valign="top">
              <!-- <p>ವಿವಾಹಿತ/ಅವಿವಾಹಿತ, Married/Unmarried</p> -->
              <p>{{Beneficiary.benf_martial_status}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>12</p>
            </td>
            <td valign="top">
              <p>ಅರ್ಜಿದಾರನ ಬ್ಯಾಂಕ್ ಖಾತೆಯ ಸಂಖ್ಯೆ, ಬ್ಯಾಂಕ್ ಹಾಗೂ ಶಾಖೆ</p>
              <p>Applicants Bank Account No. Bank and Branch</p>
            </td>
            <td valign="top">
              <p>
                {{Beneficiary.benf_bank_account_number}} <br>
                {{Beneficiary.benf_bank_name}}, {{Beneficiary.benf_bank_branch}} <br>
                IFSC : {{Beneficiary.benf_bank_ifsc}}
              </p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>13</p>
            </td>
            <td valign="top">
              <p>ರಕ್ತದ ಗುಂಪು/ Blood group</p>
            </td>
            <td valign="top">
              <p>{{Beneficiary.benf_blood_group}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <p>14</p>
            </td>
            <td valign="top">
              <p>ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ/ ಆಧಾರ್ ಕಾರ್ಡ್ ಸಂಖ್ಯೆ/ ಎನ್.ಪಿ.ಆರ್ </p>
              <p>EPIC Card/ ADHAR Card/ NPR :</p>
            </td>
            <td valign="top">
              <p><b>{{Beneficiary.benf_identity_card_type}}</b></p>
                  <p>{{Beneficiary.benf_identity_card_number}}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <center>
        <p><b>ನಮೂನೆ-6</b></p>
        <p><b>FORM-VI</b></p>
        <p><b>[ನಿಯಮ 20ರ ಉಪನಿಯಮ (3)]</b></p>
        <p>[Sec sub rule (3) or Rule 20]</p>
        <p><b>ನಾಮ ನಿರ್ದೇಶನ ಅರ್ಜಿ</b></p>
        <p><b>Nomination</b></p>
      </center>
      <!-- <p>ನೋಂದಣಿ ಸಂಖ್ಯೆ:</p>
      <p>Registration No.</p> -->
      <p><b>ಗೆ/TO</b></p>
      <p>ಫಲಾನುಭವಿ ನೋಂದಣಾಧಿಕಾರಿ/Beneficiary Registration officer</p>
      <p>(ಕಾರ್ಮಿಕ ಅಧಿಕಾರಿ/ಹಿರಿಯ ಕಾರ್ಮಿಕ ನಿರೀಕ್ಷಕರು/ಕಾರ್ಮಿಕ ನಿರೀಕ್ಷಕರು)</p>
      <p>(Labour Officer/Senior Labour Inspector/ Labour Inspector) </p>
      <p>ನಾನು ಈ ಮೂಲಕ ಕೆಳಕಂಡ ವೃತ್ತಿ/ವ್ಯಕ್ತಿಗಳನ್ನು ನಾನು ಮೃತಪಟ್ಟ ನಂತರ ನನಗೆ ಬರತಕ್ಕ ಹಣ ಸ್ವೀಕರಿಸಲು ನಾನು ನಿರ್ದೇಶಿಸುತ್ತೇನೆ.</p>
      <p>I hereby nominate the person/persons below to receive the amount due to me on the event of my death.</p>
      <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td valign="top">
              <p>ಕ್ರಮ ಸಂಖ್ಯೆ</p>
              <p>Sl.No</p>
            </td>
            <td valign="top">
              <p>ನಾಮನಿರ್ದೇಶಿತ (ರ) ಹೆಸರು ಮತ್ತು ವಿಳಾಸ <br>Name and Address of the nominee (s)</p>
            </td>
            <td valign="top">
              <p>ಅರ್ಜಿದಾರನ ಜೊತೆ ನಾಮ ನಿರ್ದೇಶಿತ (ರು) ಹೊಂದಿರುವ ಸಂಬಂಧ <br> Nominee’s Relationship with the workers</p>
            </td>
            <td valign="top">
              <p>ನಾಮ ನಿರ್ದೇಶಿತ (ರ) ವಯಸ್ಸು Age of the Nominee(s)</p>
            </td>
            <td valign="top">
              <p>ಪ್ರತಿ ನಾಮ ನಿರ್ದೇಶಿತರಿಗೆ ಮೊತ್ತದಲ್ಲಿ ಪಾವತಿ ಮಾಡಬೇಕಾದ ಪಾಲು <br>Amount of share to be paid to each nominee</p>
            </td>
          </tr>
          <tr ng-repeat="nominee in NomineeList">
            <td>{{$index+1}}</td>
            <td>{{ nominee.nominee_full_name }} <br>
            {{ nominee.nominee_address }}</td>
            <td>{{ nominee.nominee_relationship_with_benf }}</td>
            <td>{{ nominee.nominee_age }} years. <br>
            ( {{ nominee.nominee_dob | date }} )</td>
            <td>{{ nominee.nominee_share }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <p>ನನ್ನ ಕುಟುಂಬದ ಅವಲಂಭಿತ ಸದಸ್ಯರುಗಳ ವಿವರಗಳು ಈ ಕೆಳಕಂಡಂತೆ ಇವೆ.</p>
      <p>Details of my dependent Family Members</p>
      <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td rowspan="2">
              <p>ಕ್ರಮ ಸಂಖ್ಯೆ</p>
              <p>Sl.No</p>
            </td>
            <td colspan="3">
              <p>ಕುಟುಂಬದ ಅವಲಂಭಿತ ಸದಸ್ಯರ ವಿವರ</p>
              <p>Family Members Details</p>
            </td>
            <td rowspan="2">
              <p>ಅರ್ಜಿದಾರನ ಜೊತೆ ಹೊಂದಿರುವ ಸಂಬಂಧ Relationship with the Applicant</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>ಹೆಸರು</p>
              <p>Name</p>
            </td>
            <td>
              <p>ವಯಸ್ಸು</p>
              <p>Age</p>
            </td>
            <td>
              <p>ವಿಳಾಸ</p>
              <p>Addres</p>
            </td>
          </tr>
          <tr ng-repeat="dependent in DependentsList">
            <td>{{$index + 1}}</td>
            <td><p>{{ dependent.depnt_full_name }}</p></td>
            <td><p>{{ dependent.depnt_age }} years. ( {{ dependent.depnt_dob | date }} )</p></td>
            <td><p>{{ dependent.depnt_address }}</p></td>
            <td><p>{{dependent.depnt_relationship_with_benf}}</p> </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <footer class="col-md-6 col-md-offset-5">
      <p class="pull-right">Acknowledgement Number&nbsp;:&nbsp;<b>{{Beneficiary.benf_acknowledgement_number}}</b><br>
      <small>Generated : <b>{{dt | date : "dd-MMM-y hh:mm a"}} </b></small>
      </p>
    </footer>
  </div>
</div>
<div class="row">
  <button class="btn btn-primary col-md-1 col-md-offset-10" ng-click="printPage('printId')">PRINT</button>
</div>
  <div class="panel panel-success">
    <!-- <div data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-heading cursorPointer">Beneficiary Full Details<span class="pull-right">Acknowledgement Number&nbsp;:&nbsp;<b>{{Beneficiary.benf_acknowledgement_number}}</b></span></div> -->

    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        <h3 class="text-center subHeading">Employment Certificate</h3><br>

        <div ng-repeat="certificate in  Certificates">
          <div class="panel-heading text-left"><b style="text-decoration: underline;">Certificate {{$index+1}}</b>
          </div>
          <div class="panel-body">
            <div class="row form-group">
              <label class="control-label col-md-2">Employer&nbsp;Full&nbsp;Name : </label>
              <div class="col-md-4">{{certificate.benf_employer_full_name}}</div>
              <label class="control-label col-md-2">Project&nbsp;Name : </label>
              <div class="col-md-4">{{certificate.benf_present_project_name}}</div>
            </div>
            <div class="row form-group">
              <label class="control-label col-md-2">Work&nbsp;Address : </label>
              <div class="col-md-4">{{certificate.benf_present_work_address}}</div>
              <label class="control-label col-md-2">Work&nbsp;Start&nbsp;Date : </label>
              <div class="col-md-4">{{certificate.benf_work_start_date | date}}</div>
            </div>
            <div class="row form-group">
              <label class="control-label col-md-2">Work&nbsp;End&nbsp;Date : </label>
              <div class="col-md-4">{{certificate.benf_work_end_date | date}}</div>
            </div>
          </div>
        </div>
        <br>
        <h3 class="text-center subHeading">Payment Details</h3><br>

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
                <i class="fa fa-inr"></i>&nbsp;{{Payment.amount}}
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
                &nbsp;&nbsp;<b>Payment Ref Id<span class="pull-right WordsLeftStyle">:</b>
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

        <br>
        <br>
		<div class="row" ng-show="!Beneficiary.actionRequired">
			<div class="col-sm-3">
			    &nbsp;&nbsp;<b style="color:green;font-size:18px;">Admin Comments  <span class="pull-right WordsLeftStyle">:</b>
			</div>
			<div class="col-sm-9">
			    {{Beneficiary.admin_comments}}
			</div>
		</div><br>
		<div class="row" ng-show="!Beneficiary.actionRequired">
			<div class="col-sm-3">
			    &nbsp;&nbsp;<b style="color:green;font-size:18px;">Rejection Reason  <span class="pull-right WordsLeftStyle">:</b>
			</div>
			<div class="col-sm-9">
			    {{Beneficiary.rejection_reason}}
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
  <div id="RejectConfirm" style="display:none" title="Reject Confirmation">
    Please select the reason for rejection <br><br>
  <div ng-repeat="reason in rejectReasons">
    <input type="checkbox" name="rejection_reason_{{reason.entity_id}}" ng-model="Beneficiary.Reasons[$index].rejection_reason" ng-value="reason.entity_id"/>
    <label>{{reason.entity_value}}</label>
  </div><br>
    Application will get <b> rejected </b> once you click Yes. Are you sure?<br>
  </div>
</div>