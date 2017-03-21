app.controller("BeneficiaryIndexController", ['$scope', '$http', 'config', '$window',
    function($scope, $http, config, $window) {

        // for Index page   
        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.AllBeneficiaries = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;

        $http.get(config.baseUrl + "/beneficiary/allbeneficiaries")
            .then(function(response) {
                $scope.AllBeneficiaries = response.data;
            });
            
        $scope.updateBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/create?id=" + id;
        }

        $scope.ViewBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/view?id=" + id;
        }

        $scope.ViewPayments = function(id) {
            $window.location.href = config.baseUrl + "/payment/index?id=" + id;
        }

        $scope.TakeAction = function(index,id){
            $( "#BeneficiaryActionConfirm" ).dialog({
              resizable: true,
              height:140,
              width:'25%',
              modal: true,
              buttons: {
                "Yes": function() {
                  $( this ).dialog( "close" );
                  $http.post(config.baseUrl+"/beneficiary/appliedbeneficiary",{"id":id})
                    .then(function(response) {  
                        if(response.data.status == "success"){
                            $scope.AllBeneficiaries[index].benf_application_status = response.data.newStatus;
                            $scope.AllBeneficiaries[index].CanConfirm = false;
                            $scope.AllBeneficiaries[index].Editable = false;
                        }
                    });
                },
                "No": function() {
                  $( this ).dialog( "close" );
                }
              }
            });
            $(".ui-dialog-titlebar-close").html("X");
        }
}]);