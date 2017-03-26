<?php
    $this->title = 'Applicant Payment Details';
?>
<div ng-cloak class="PaymentCtrl" ng-controller="PaymentController" ng-init="Index()">
<center><h3>Applicant Payment Details</h3></center>
<br />
<br />
<div class="row">
  <span class="gridDetails">Applicant Name : <b>{{full_name}}</b> &nbsp;&nbsp;&nbsp;Registration No : <b>{{registration_no}}</b> </span>
  <a class="nameLink" href="{{baseUrl}}/beneficiary"><button type="button" style="float:right;" class="btn btn-default">Back </button></a>
  <button type="button" style="float:right;margin-right:1%;" ng-click="AddPayment()" class="btn btn-default">Add Payment</button>
</div>
<br />
<div class="row"> 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><a href="#" >No.</a></th>
        <th><a href="#" >Reference Id</a></th>
        <th><a href="#" >Payment For </a></th>
        <th><a href="#" >Payment Mode </a></th>
        <th><a href="#" >Payment Date </a></th>
        <th><a href="#" >Amount </a></th>
        <th><a href="#" >Payment Status </a></th>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="payment in Payments | filter : searchName | itemsPerPage: selectedRowsPerPage">
        <td>{{$index+1}}</td>
        <td ng-show="payment.Editable">
          <a class="nameLink" ng-click="UpdatePayment(payment.id)">{{payment.payment_reference_id}}</a>
        </td>
        <td ng-show="!payment.Editable">
          {{payment.payment_reference_id}}
        </td>
        <td>{{payment.payment_for}}</td>
        <td>{{payment.payment_mode}}</td>
        <td>{{payment.payment_date | date }}</td>
        <td>{{payment.amount}}</td>
        <td>{{payment.payment_status}}</td>
      </tr>
      <tr ng-show="ListError">
        <td colspan="6" style="text-align:center;"> 
                <small class="error">----  No payments available related to this beneficiary    ----</small>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row"><div class="col-sm-8 text-right">Total Paid : </div><div class="col-sm-4"><b>&nbsp;&nbsp;{{totalAmount}}</b></div></div>
<div class="row pull-right" style="padding-right:1%">
  <dir-pagination-controls
    direction-links="true"
    boundary-links="true" >
  </dir-pagination-controls>
</div>
</div>
</div>