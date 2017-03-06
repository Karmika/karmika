app.controller("BeneficiaryUpdateController", ['$scope', '$http', '$window', 'config', 'CustomService',
    function($scope, $http, $window, config, CustomService) {

        $scope.genders = config.genders;
        $scope.martialStatusList = config.martialStatusList;

        var id = CustomService.getParameterByName('id');
        $http.post(config.baseUrl + "/beneficiary/getbeneficiary", { "id": id })
            .then(function(response) {
                if (response.data.benf_date_of_birth != null) response.data.benf_date_of_birth = new Date(response.data.benf_date_of_birth);
                $scope.BeneficiaryUpdate = response.data;
            });

        $scope.Updatedata = function() {
            console.log($scope.BeneficiaryUpdate);
            if (!$scope.BeneficiaryUpdate.$invalid) $window.location.href = config.baseUrl + "/beneficiary";
            $http.post(config.baseUrl + "/beneficiary/updatebeneficiary", $scope.BeneficiaryUpdate)
                .then(function(response) {
                    if (response.data == "success") $window.location.href = config.baseUrl + "/beneficiary";
                });
            return false;
        }
    }
]);