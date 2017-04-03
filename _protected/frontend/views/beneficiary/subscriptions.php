<?php
    $this->title = 'Subscription Details';
?>
<div ng-cloak class="SubscriptionCtrl" ng-controller="SubscriptionController" ng-init="Index()">
<center><h3>Subscription Details</h3></center>
<br />
<br />
<div class="row">
  <span class="gridDetails">Applicant Name : <b>{{full_name}}</b> &nbsp;&nbsp;&nbsp;Registration No : <b>{{registration_no}}</b> </span>
  <a class="nameLink" href="{{baseUrl}}/payment/index?id={{id}}"><button type="button" style="float:right;" class="btn btn-default">Back </button></a>
</div>
<br />
<div class="row"> 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><a href="#" >No.</a></th>
        <th><a href="#" >Subscsription Start Date</a></th>
        <th><a href="#" >Subscsription End Date</a></th>
        <th><a href="#" >Amount Paid</a></th>
        <th><a href="#" >Updated By </a></th>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="subscription in Subscriptions | filter : searchName | itemsPerPage: selectedRowsPerPage">
        <td>{{$index+1}}</td>
        <td>{{subscription.start_date}}</td>
        <td>{{subscription.end_date}}</td>
        <td>{{subscription.amountPaid }}</td>
        <td>{{subscription.updated_by}}</td>
      </tr>
      <tr ng-show="ListError">
        <td colspan="6" style="text-align:center;"> 
                <small class="error">----  No subscriptions available related to this beneficiary    ----</small>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row pull-right" style="padding-right:1%">
    <dir-pagination-controls
      direction-links="true"
      boundary-links="true" >
    </dir-pagination-controls>
  </div>
</div>
</div>