<?php
    $this->title = 'Beneficiary Payment Details';
?>
<div ng-cloak class="SubscriptionCtrl" ng-controller="PaymentController">
<center><h3>Beneficiary Payment Details</h3></center>
<br />
<br />
<div class="row">
  <span class="gridDetails">Beneficiary Name : <b>{{full_name}}</b> &nbsp;&nbsp;&nbsp;Registration No : <b>{{registration_no}}</b> </span>
  <a class="nameLink" href="{{baseUrl}}/beneficiary"><button type="button" style="float:right;" class="btn btn-default">Back </button></a>
  <button type="button" style="float:right;margin-right:1%;" ng-click="AddPayment()" class="btn btn-default">Add Payment</button>
</div>
<br />
<div class="row"> 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><a href="#" >No.</a></th>
        <th><a href="#" >Payment Mode </a></th>
        <th><a href="#" >Payment Status </a></th>
        <th><a href="#" >Payment Date </a></th>
        <th><a href="#" >Amount </a></th>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="payment in Payments | filter : searchName | itemsPerPage: selectedRowsPerPage">
        <td>{{$index+1}}</td>
        <td>
          <a class="nameLink" ng-click="updatePayment(payment.id)">{{payment.payment_mode}}</a>
        </td>
        <td>{{payment.payment_status}}</td>
        <td>{{payment.payment_date | date :  "dd-MM-yyyy" }}</td>
        <td>{{payment.amount}}</td>
      </tr>
      <tr ng-show="ListError">
        <td colspan="6" style="text-align:center;"> 
                <small class="error">----  No payments available related to this beneficiary    ----</small>
        </td>
      </tr>
    </tbody>
  </table>
  <dir-pagination-controls
    direction-links="true"
    boundary-links="true" >
  </dir-pagination-controls>
</div>
</div>