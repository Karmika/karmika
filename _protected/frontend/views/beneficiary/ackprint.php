<style type="text/css">
@page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
<div class="AckPrintCtrl" ng-cloak ng-controller="BeneficiaryAckPrintController" style="background-color: #ffffff;">
<button class="btn btn-success pull-right hidden-print" style="margin:7px;padding:5px 8px;" onclick="javascript:window.print();">Print</button>
  <div id='ackPrint'>
    <div class="row">
      <div class="pull-left col-xs-12" style="margin:10px;">
        <p>Labour Office 2 Bangalore</p>
        <p>Senior Labour Inspector, 48th Circle</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <img class="KarnatakaLogoPreview center-block img-responsive" ng-src="{{KarnatakaLogo}}"  alt="Applicant image" height="150px;" width="100px"/>
        <p class="text-center AckHeading">Acknowledgement</p>
        <p class="text-center AckHeading BttomBorder" style="margin-bottom:10px;">Karnataka Building &amp; Other Construction Workers’ Welfare</p>
        <p class="text-center AckHeading">Acknowledgement for the receipt of Beneficiary Registration</p>
      </div>
    </div><br>
    <div class="row srow">
      <div class="col-xs-6">Acknowledgement Number<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.acknowledgement_number || '----' }}</div>
    </div>
    <div class="row srow">
      <div class="col-xs-6">Name of the Applicant<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.applicant_name}}</div>
    </div>
    <div class="row srow">
    <div class="col-xs-6">Address of Applicant<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.applicant_address}}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Date of Application<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.date_of_application | date : "MMM d, y h:mm:ss a" }}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Received application in name<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.received_application_name}}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Registration Fee (Rs)<span class="pull-right">:</span></div><div class="col-xs-6"><i class="fa fa-inr"></i>&nbsp;{{Ack.registration_fee}}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Subscription Fee(Rs)<span class="pull-right">:</span></div><div class="col-xs-6"><i class="fa fa-inr"></i>&nbsp;{{Ack.subscription_fee}}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Contact RO by Date<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.contact_ro_by_date | date }}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Office Contact No<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.office_contact_no}}</div>
    </div>
    <div class="row srow">   
      <div class="col-xs-6">Adhaar No<span class="pull-right">:</span></div><div class="col-xs-6">{{Ack.identity_card_number}}</div>
    </div>
    <br>
    <br>
    <div class="row">
      <p class="pull-right">Registration Officer</p>
    </div>
    <br>
    <br>
    <div>
      <p class="text-center AckHeading" style="font-size:11px;">Computer generated acknowledgement. Signature is not required (Office Copy)</p>
    </div>
    <br>
  </div>

</div>