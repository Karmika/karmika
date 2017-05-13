app.controller("PasswordController", ['$scope', '$http', 'config', '$window','CustomService',
    function($scope, $http, config, $window, CustomService) {

        $scope.step1 = true;
        $scope.step2 = false;
        $scope.step3 = false;
        $scope.PasswordReset = {}

        $scope.GenerateOTP = function(){
            $scope.step1 = false;
            $scope.step2 = true;
            $scope.step3 = false;
            
            $http.get(config.baseUrl+"/site/sendotp?mob="+ $scope.PasswordReset.mob)
            .then(function(response) {
                console.log(response.data);
            });
        }

        $scope.VerifyOTP = function(){
            $scope.step1 = false;
            $scope.step2 = false;
            $scope.step3 = true;
        }

        $scope.SavePassword = function(){
            $window.location.href = config.baseUrl + "/site/save-password";
        }
}]);