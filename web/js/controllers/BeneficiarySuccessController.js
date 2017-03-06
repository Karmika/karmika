app.controller("BeneficiarySuccessController", ['$scope', 'CustomService',
    function($scope, CustomService) {

        $scope.ApplicationReferenceNo = CustomService.getParameterByName('id');

    }
]);