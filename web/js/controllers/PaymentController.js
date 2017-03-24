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
        $scope.paymentModes = {};
        $scope.paymentStatuses = {};
        $scope.paymentFors = [];

        $scope.Payment = {};
        $scope.benf_master_id = CustomService.getParameterByName('id');
        $scope.full_name = CustomService.getParameterByName('Name');
        $scope.registration_no = CustomService.getParameterByName('rno');

        CustomService.SeedData('payment_mode').then(function(data) {
            $scope.paymentModes = data;
        });

        CustomService.SeedData('payment_status').then(function(data) {
            $scope.paymentStatuses = data;
        });

        CustomService.SeedData('payment_for').then(function(data) {
            $scope.paymentFors = data; 
        });

        $scope.$watch('Payment.payment_mode',function(newVal){
            if(newVal != undefined && (newVal.entity_value == "DD" || newVal.entity_value == "Cheque"))
            { 
                $scope.BankAndPaydateFieldShow = true;
            }
            else
            { 
                $scope.BankAndPaydateFieldShow = false;
                $scope.Payment.bank_name = null;
                $scope.Payment.chequeordd_no = null;
                $scope.Payment.bank_payment_date = new Date();
            }
        });

        $scope.CreatePayment = function(){
            var PaymentDetails = CustomService.MakeingCustomFormatDataForBeneficiaryPayment($scope.Payment);
            PaymentDetails.benf_master_id = $scope.benf_master_id;
            $http.post(config.baseUrl+"/payment/createpayment",PaymentDetails)
            .then(function(response) {
                if(response.data.status == "success") $window.location.href = config.baseUrl + "/payment/index?id=" + $scope.benf_master_id;
            });
        }
    }

}]);