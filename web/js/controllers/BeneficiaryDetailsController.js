app.controller("BeneficiaryDetailsController",['$scope','CustomService','config','$http','$window',
    function ($scope,CustomService,config,$http,$window) {    

    var id = CustomService.getParameterByName('id');
    $http.post(config.baseUrl+"/beneficiary/getbeneficiaryalldata",{"id":id})
    .then(function(response) {
        if(response.data.Beneficiary.benf_date_of_birth != null) response.data.Beneficiary.benf_date_of_birth = new Date(response.data.Beneficiary.benf_date_of_birth);
        $scope.Beneficiary = response.data.Beneficiary;
        $scope.defaultPic = config.profilePicUploadedPath + $scope.Beneficiary.id + ".png";
        $scope.NomineeList = response.data.NomineeList;
        $scope.DependentsList = response.data.DependentsList;
        $scope.Certificates = response.data.Certificates;
        $scope.Payment = response.data.Payment;
        $scope.FormatPayment();
    });

    $scope.FormatPayment = function(){
        $scope.Payment.payment_date = new Date($scope.Payment.payment_date);
        CustomService.SeedData('payment_mode').then(function(data) {
            angular.forEach(data, function(value, key) {
                if(value.entity_id == $scope.Payment.payment_mode)
                    $scope.Payment.payment_mode = data[key];
            });
        });

        CustomService.SeedData('payment_status').then(function(data) {
            angular.forEach(data, function(value1, key1) {
                if(value1.entity_id == $scope.Payment.payment_status)
                    $scope.Payment.payment_status = data[key1];
            });
        });

        CustomService.SeedData('payment_for').then(function(data) {
            angular.forEach(data, function(value2, key2) {
                if(value2.entity_id == $scope.Payment.payment_for)
                    $scope.Payment.payment_for = data[key2];
            });
        });
    }

    $scope.Approve = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/approvebeneficiary",{"id":id,"adminComments":(typeof $scope.adminComments != "undefined" && $scope.adminComments)?$scope.adminComments:""})
        .then(function(response) {
            if(response.data.status == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

    $scope.Reject = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/rejectbeneficiary",{"id":id,"adminComments":$scope.adminComments})
        .then(function(response) {
            if(response.data.status == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

}]);