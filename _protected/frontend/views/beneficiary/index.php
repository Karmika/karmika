<?php

    $this->title = 'Beneficiary Details';
?>
<style type="text/css">
td,th{
  text-align: center;
}
</style>
<div class="BeneficiaryCtrl" ng-cloak ng-controller="BeneficiaryIndexController">
<center><p style="font-size: 3rem;">Status of Registration Applications</p></center>
<br />
<br />

<div class="row">
  <a class="nameLink" href="{{baseUrl}}/beneficiary/create"><button type="button" class="btn btn-default">Add Application </button></a>&nbsp;&nbsp;&nbsp;
  <div class="col-sm-4" style="padding-left: 0px;">
      <div id="imaginary_container"> 
          <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  ng-model="searchName" placeholder="Search (Enter Application No. / Ack No / Reg No / ...)" >
              <span class="input-group-addon">
                  <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>  
              </span>
          </div>
      </div>
  </div>
</div>
<br /><br />  

<div class="row">                 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>
          <a href="#" ng-click="orderByField='benf_application_number'; reverseSort = !reverseSort">
          Application&nbsp;No</a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_application_number'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_acknowledgement_number'; reverseSort = !reverseSort">
          Ack&nbsp;No</a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_acknowledgement_number'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_registration_number'; reverseSort = !reverseSort">
          Reg&nbsp;No</a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_registration_number'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='full_name'; reverseSort = !reverseSort">
          Applicant’s Name </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'full_name'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_mobile_no'; reverseSort = !reverseSort">
          Mobile No. </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_mobile_no'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_date_of_birth'; reverseSort = !reverseSort">
          DOB </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_date_of_birth'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_sex'; reverseSort = !reverseSort">
          Sex </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_sex'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='updated_by'; reverseSort = !reverseSort">
          Submitted By </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'updated_by'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_application_status'; reverseSort = !reverseSort">
          Status </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_application_status'"><span ng-show="!reverseSort">&uArr;</span><span ng-show="reverseSort">&dArr;</span>
        </th>
        <th> Ack</th>
        <th> Payments </th>
        <th> View </th>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="beneficiary in AllBeneficiaries | filter : searchName | orderBy:orderByField:reverseSort | itemsPerPage: selectedRowsPerPage" >
        <!-- <td>{{beneficiary.sno}}</td> -->
        <td>{{beneficiary.benf_application_number || "----"}}</td>
        <td>{{beneficiary.benf_acknowledgement_number || "----"}}</td>
        <td>{{beneficiary.benf_registration_number || "----"}}</td>
        <td ng-show="beneficiary.Editable">
          <a class="nameLink" ng-click="updateBeneficiary(beneficiary.id)">{{beneficiary.full_name}}</a>
        </td>
        <td ng-show="!beneficiary.Editable">{{beneficiary.full_name}}</td>
        <td>{{beneficiary.benf_mobile_no}}</td>
        <td>{{beneficiary.benf_date_of_birth}}</td>
        <td>{{beneficiary.benf_sex}}</td>
        <!-- <td>{{beneficiary.benf_martial_status}}</td> -->
        <td>{{beneficiary.created_by}}</td>
        <?php if($IsSubAdmin || $IsAdmin){?>
         <td ng-show="!beneficiary.CanConfirm">{{beneficiary.benf_application_status}}</td>
         <td ng-show="beneficiary.CanConfirm">
            <a class="nameLink" ng-click="TakeAction($index,beneficiary.id)">{{beneficiary.benf_application_status}}</a>
         </td>
        <?php }else{ ?>
         <td>{{beneficiary.benf_application_status}}</td>
        <?php } ?>
        <td ng-show="!beneficiary.Editable">
          <a class="nameLink" ng-click="PrintApplication(beneficiary.id)"><span style="font-size: 20px;padding-left:10px;" class="glyphicon glyphicon-list-alt"></span></a>
        </td>
        <td ng-show="beneficiary.Editable"><span style="padding-left:10px;"> --- </span></td>
        <td ng-show="!beneficiary.Editable && !beneficiary.actionRequired && beneficiary.Approved">
          <a class="nameLink" ng-click="ViewPayments(beneficiary.id)"><span style="font-size: 20px;padding-left:10px;" class="glyphicon glyphicon-list-alt"></span></a>
        </td>
        <td ng-show="!(!beneficiary.Editable && !beneficiary.actionRequired && beneficiary.Approved)"><span style="padding-left:10px;"> --- </span></td>

        <td ng-show="!beneficiary.Editable">
          <a class="nameLink" ng-click="ViewBeneficiary(beneficiary.id)"><span style="font-size: 20px;padding-left:10px;" class="glyphicon glyphicon-list-alt"></span></a>
        </td>
        <td ng-show="beneficiary.Editable"><span style="padding-left:10px;"> --- </span></td>
      </tr>
      <tr ng-show="AllBeneficiaries.length <= 0">
        <td colspan="12" style="text-align:center;"> 
                <small class="error">----  No beneficiary available   ----</small>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="row pull-left" ng-show="AllBeneficiaries.length > 0">
  Showing :{{ (AllBeneficiaries | filter:searchName).length }} of {{AllBeneficiaries.length}} entries
</div>
<div class="row pull-right"> 
  <dir-pagination-controls
    direction-links="true"
    boundary-links="true" >
  </dir-pagination-controls>
  <!--  <button ng-if="AllBeneficiaries.length > 5" style="float:right" ng-repeat-start="pageData in pageSelectionData" value="pageData" ng-click="ChagePageVal(pageData)" class="btn btn-default" >{{pageData}}</button>
    <span style="float:right" ng-repeat-end>&nbsp;</span> -->
</div>
  <div id="BeneficiaryActionConfirm" style="display: none;" title="Application Acceptance Confirmation">
    Application will go to "Applied" state and will be processed once you click Yes. Are you sure?
  </div>
</div>