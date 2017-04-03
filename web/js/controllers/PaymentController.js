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
               $scope.totalAmount += parseInt(val.amount);
            });
        }

        $scope.AddPayment = function(){
            $window.location.href = config.baseUrl + "/payment/create?master_id=" + id +"&Name="+ $scope.full_name +"&rno="+ $scope.registration_no;
        }

        $scope.UpdatePayment = function(PaymentId){
            $window.location.href = config.baseUrl + "/payment/create?master_id=" + id+"&pid="+ PaymentId +"&Name="+ $scope.full_name +"&rno="+ $scope.registration_no;
        }

        $scope.GoToSubscriptions = function(){
            $window.location.href = config.baseUrl + "/beneficiary/subscriptions?id=" + id;   
        }
    }

    $scope.Create = function(){

        $scope.paymentModes = {};
        $scope.paymentStatuses = {};
        $scope.paymentFors = [];

        $scope.Payment = {};
        $scope.benf_master_id = CustomService.getParameterByName('master_id');
        $scope.full_name = CustomService.getParameterByName('Name');
        $scope.registration_no = CustomService.getParameterByName('rno');

        CustomService.SeedData('payment_mode').then(function(data) {
            $scope.paymentModes = data;
        });

        CustomService.SeedData('payment_status').then(function(data) {
            $scope.paymentStatuses = data;
        });

        CustomService.SeedData('payment_for').then(function(data) {
            angular.forEach(data,function(value, key){
                if(value.entity_id != 2) $scope.paymentFors.push(value);
            })
        })

        $scope.FormatPayment = function(){
            $scope.Payment.payment_date = new Date($scope.Payment.payment_date);
            angular.forEach($scope.paymentModes, function(value, key) {
                if(value.entity_id == $scope.Payment.payment_mode)
                    $scope.Payment.payment_mode = $scope.paymentModes[key];
            });
            angular.forEach($scope.paymentStatuses, function(value1, key1) {
                if(value1.entity_id == $scope.Payment.payment_status)
                    $scope.Payment.payment_status = $scope.paymentStatuses[key1];
            });
            angular.forEach($scope.paymentFors, function(value2, key2) {
                if(value2.entity_id == $scope.Payment.payment_for)
                    $scope.Payment.payment_for = $scope.paymentFors[key2];
            });
        }

        $scope.$watch('Payment.payment_mode',function(newVal){
            if(newVal != undefined && (newVal.entity_id == 1 || newVal.entity_id == 2))
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
            var paymentDetails = CustomService.MakeingCustomFormatDataForBeneficiaryPayment($scope.Payment);
            paymentDetails.benf_master_id = $scope.benf_master_id;
            var action = "createpayment";
            if($scope.PaymentId != undefined && $scope.PaymentId != null) action = "updatepayment";
            $http.post(config.baseUrl+"/payment/"+action,paymentDetails)
            .then(function(response) {
                if(response.data.status == "success") $window.location.href = config.baseUrl + "/payment/index?id=" + $scope.benf_master_id;
            });
        }
        
        $scope.PaymentId = CustomService.getParameterByName('pid');
        if($scope.PaymentId)
        $http.post(config.baseUrl+"/payment/getpayment",{"id":$scope.PaymentId})
        .then(function(response) {
                $scope.Payment = response.data.Payment;
                $scope.FormatPayment();
        });

    }

}]);















app.controller("SubscriptionController", ['$scope', '$http', 'config', '$window','CustomService',
    function($scope, $http, config, $window, CustomService) {

    $scope.Index = function(){

        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.Subscriptions = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;
        $scope.ListError = false;
        $scope.totalAmount = 0;

        $scope.id = CustomService.getParameterByName('id');

        $http.post(config.baseUrl+"/beneficiary/allsubscriptions",{"id":$scope.id})
        .then(function(response) {
            $scope.Subscriptions = response.data.subscriptions;
            if ($scope.Subscriptions.length <= 0) $scope.ListError = true;
            $scope.full_name = response.data.full_name;
            $scope.registration_no = response.data.registration_no;
        });
    }

}]);