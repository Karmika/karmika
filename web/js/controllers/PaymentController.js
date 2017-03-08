app.controller("PaymentController", ['$scope', '$http', 'config', '$window','CustomService',
    function($scope, $http, config, $window, CustomService) {

        // for Index page   
        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.Payments = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;
        $scope.ListError = false;

        var id = CustomService.getParameterByName('id');

        $http.post(config.baseUrl+"/payment/allpayments",{"id":id})
        .then(function(response) {
            $scope.Payments = response.data.payments;
            if ($scope.Payments.length <= 0) $scope.ListError = true;
            $scope.full_name = response.data.full_name;
            $scope.registration_no = response.data.registration_no;
        });

}]);