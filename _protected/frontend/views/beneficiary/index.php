<?php

    $this->title = 'Beneficiary Details';
?>
<div class="BeneficiaryCtrl" ng-cloak ng-controller="BeneficiaryIndexController">
<center><p style="font-size: 3rem;">Status of Registration Applications</p></center>
<br />
<br />

<div class="row">
  <a class="nameLink" href="{{baseUrl}}/beneficiary/create"><button type="button" class="btn btn-default">Add Beneficiary </button></a>&nbsp;&nbsp;&nbsp;
  <div class="col-sm-4" style="padding-left: 0px;">
      <div id="imaginary_container"> 
          <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  ng-model="searchName" placeholder="Search" >
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
        <th>No.</th>
        <th>
          <a href="#" ng-click="orderByField='full_name'; reverseSort = !reverseSort">
          Acknowledgement&nbsp;No</a>&nbsp;<span class="Arrow" ng-show="orderByField == 'full_name'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_acknowledgement_number'; reverseSort = !reverseSort">
          Applicant’s Name </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_acknowledgement_number'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_mobile_no'; reverseSort = !reverseSort">
          Mobile No. </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_mobile_no'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_date_of_birth'; reverseSort = !reverseSort">
          Date Of Birth </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_date_of_birth'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_sex'; reverseSort = !reverseSort">
          Sex </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_sex'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_martial_status'; reverseSort = !reverseSort">
          Martial Status </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_martial_status'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='updated_by'; reverseSort = !reverseSort">
          Submitted By </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'updated_by'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <th>
          <a href="#" ng-click="orderByField='benf_application_status'; reverseSort = !reverseSort">
          Status </a>&nbsp;<span class="Arrow" ng-show="orderByField == 'benf_application_status'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span>
        </th>
        <?php if($IsAdmin){?>
        <th>
          View
        </th>
        <?php }?>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="beneficiary in AllBeneficiaries | filter : searchName | orderBy:orderByField:reverseSort | itemsPerPage: selectedRowsPerPage" >
        <td>{{beneficiary.sno}}</td>
        <td>{{beneficiary.benf_acknowledgement_number}}</td>
        <td ng-show="beneficiary.Editable">
          <a class="nameLink" ng-click="updateBeneficiary(beneficiary.id)">{{beneficiary.full_name}}</a>
        </td>
        <td ng-show="!beneficiary.Editable">{{beneficiary.full_name}}</td>
        <td>{{beneficiary.benf_mobile_no}}</td>
        <td>{{beneficiary.benf_date_of_birth}}</td>
        <td>{{beneficiary.benf_sex}}</td>
        <td>{{beneficiary.benf_martial_status}}</td>
        <td>{{beneficiary.updated_by}}</td>
        <td>{{beneficiary.benf_application_status}}</td>
        <?php if($IsAdmin){?>
          <td>
            <a class="nameLink" ng-click="ViewBeneficiary(beneficiary.id)"><span style="font-size: 20px;padding-left:10px;" class="glyphicon glyphicon-list-alt"></span></a>
        </td>
        <?php }?>
      </tr>
      <tr ng-show="ListError">
        <td colspan="10" style="text-align:center;"> 
                <small class="error">----  No beneficiary available   ----</small>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="row pull-right"> 
  <dir-pagination-controls
    direction-links="true"
    boundary-links="true" >
  </dir-pagination-controls>
  <!--  <button ng-if="AllBeneficiaries.length > 5" style="float:right" ng-repeat-start="pageData in pageSelectionData" value="pageData" ng-click="ChagePageVal(pageData)" class="btn btn-default" >{{pageData}}</button>
    <span style="float:right" ng-repeat-end>&nbsp;</span> -->
</div>
</div>