app.controller("BeneficiaryDetailsController",['$scope','CustomService','config','$http','$window',
    function ($scope,CustomService,config,$http,$window) {    

    var id = CustomService.getParameterByName('id');
    $http.post(config.baseUrl+"/beneficiary/getbeneficiaryalldata",{"id":id})
    .then(function(response) {
        if(response.data.Beneficiary.benf_date_of_birth != null) response.data.Beneficiary.benf_date_of_birth = new Date(response.data.Beneficiary.benf_date_of_birth);
        $scope.Beneficiary = response.data.Beneficiary;
        $scope.NomineeList = response.data.NomineeList;
        $scope.DependentsList = response.data.DependentsList;
        $scope.Certificates = response.data.Certificates;
    });

    $scope.Approve = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/approvebeneficiary",{"id":id,"adminComments":(typeof $scope.adminComments != "undefined" && $scope.adminComments)?$scope.adminComments:""})
        .then(function(response) {
            if(response.data == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

    $scope.Reject = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/rejectbeneficiary",{"id":id,"adminComments":$scope.adminComments})
        .then(function(response) {
            if(response.data == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

}]);