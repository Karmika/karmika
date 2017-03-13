app.controller("PaymentController", ['$scope', '$http', 'config', '$window','CustomService',
    function($scope, $http, config, $window, CustomService) {

    $scope.Index = function(){

        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.Payments = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;
        $scope.ListError = false;
        $scope.totalAmount = 0;

        var id = CustomService.getParameterByName('id');

        $http.post(config.baseUrl+"/payment/allpayments",{"id":id})
        .then(function(response) {
            $scope.Payments = response.data.payments;
            if ($scope.Payments.length <= 0) $scope.ListError = true;
            $scope.full_name = response.data.full_name;
            $scope.registration_no = response.data.registration_no;
            $scope.CalculateAmount();
        });

        $scope.CalculateAmount = function(){
            angular.forEach($scope.Payments, function(val, key) {
               $scope.totalAmount += val.amount;
            });
        }

        $scope.AddPayment = function(){
            $window.location.href = config.baseUrl + "/payment/create?id=" + id +"&Name="+ $scope.full_name +"&rno="+ $scope.registration_no;
        }
    }

    $scope.Create = function(){
        $scope.Payment = {};
        $scope.Payment.benf_master_id = CustomService.getParameterByName('id');
        $scope.full_name = CustomService.getParameterByName('Name');
        $scope.registration_no = CustomService.getParameterByName('rno');

        $scope.CreatePayment = function(){
            $http.post(config.baseUrl+"/payment/createpayment",$scope.Payment)
            .then(function(response) {
                if(response.data.status == "success") $window.location.href = config.baseUrl + "/payment/index?id=" + $scope.Payment.benf_master_id;
            });
        }
    }

}]);