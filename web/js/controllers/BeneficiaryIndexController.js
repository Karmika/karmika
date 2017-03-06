app.controller("BeneficiaryIndexController", ['$scope', '$http', 'config', '$window',
    function($scope, $http, config, $window) {

        // for Index page   
        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.AllBeneficiaries = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;
        $scope.ListError = false;

        $http.get(config.baseUrl + "/beneficiary/allbeneficiaries")
            .then(function(response) {
                $scope.AllBeneficiaries = response.data;
                if ($scope.AllBeneficiaries.length <= 0) $scope.ListError = true;
            });
            
        $scope.updateBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/create?id=" + id;
        }

        $scope.ViewBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/view?id=" + id;
        }

}]);