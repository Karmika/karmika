app.controller("PasswordController", ['$scope', '$http', 'config', '$window','CustomService',
    function($scope, $http, config, $window, CustomService) {

        $scope.step1 = true;
        $scope.step2 = false;
        $scope.step3 = false;
        $scope.PasswordReset = {};
        $scope.regEx="/^[0-9]{10,10}$/;";
        $scope.ServerVaidationErrorForOTP = false;
        $scope.ServerVaidationErrorForMobile = false;

        $scope.$watchGroup(['PasswordReset.otp','PasswordReset.mob'], function(){
            $scope.ServerVaidationErrorForOTP = false;
            $scope.ServerVaidationErrorForMobile = false;
        });

        $scope.GenerateOTP = function(){            
            $http.get(config.baseUrl+"/site/sendotp?mob="+ $scope.PasswordReset.mob)
            .then(function(response) {
                if(response.data){
                    $scope.step1 = false;
                    $scope.step2 = true;
                }else $scope.ServerVaidationErrorForMobile = true;
            },
            function(){
                $window.location.href = config.baseUrl + "/site/custom-error";
            });
        }

        $scope.VerifyOTP = function(){
            $http.get(config.baseUrl+"/site/verifyotp?mob="+ $scope.PasswordReset.mob + "&otp="+ $scope.PasswordReset.otp)
            .then(function(response) {
                if(response.data){
                    $scope.step2 = false;
                    $scope.step3 = true;
                }else $scope.ServerVaidationErrorForOTP = true;
            },
            function(){
                $window.location.href = config.baseUrl + "/site/custom-error";
            });
        }

        $scope.SavePassword = function(){
            $http.get(config.baseUrl+"/site/changepassword?mob="+ $scope.PasswordReset.mob + "&pass="+ $scope.PasswordReset.new_password)
            .then(function(response) {
                if(response.data) $window.location.href = config.baseUrl + "/site/save-password";
            },
            function(){
                $window.location.href = config.baseUrl + "/site/custom-error";
            });
        }
}]);