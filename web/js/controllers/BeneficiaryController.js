//Beneficiary Controller
app.controller("BeneficiaryController", ['$scope', '$http', 'config', '$window', 'CustomService', 'fileUpload','$timeout',
    function($scope, $http, config, $window, CustomService, fileUpload, $timeout) {

        // for Index page   
        $scope.orderByField = '';
        $scope.reverseSort = false;
        $scope.AllBeneficiaries = [];
        $scope.searchName = "";
        $scope.isActiveFilter = 1;
        $scope.ListError = false;

        $scope.genders = config.genders;
        $scope.martialStatusList = config.martialStatusList;
        $scope.casteList = config.casteList;
        $scope.accountTypeList = config.accountTypeList;
        $scope.natureOfWorks = config.natureOfWorks;
        $scope.bloodGroupList = config.bloodGroupList;
        $scope.IdentityCardTypeList = config.IdentityCardTypeList;

        $scope.AcknowledgementNumber = "";
        $scope.master_id = "";

        /* Nominee */
        $scope.NomineeList = [];
        $scope.insertNominee = function(idx) {
            var individualNominee = {
                "nominee_full_name": '',
                "nominee_address": '',
                "nominee_age": '',
                "nominee_dob": '',
                "nominee_share": 100
            };
            $scope.NomineeList.push(individualNominee);

            if(idx>=0){
                $scope.changedPercentage(idx);
            }
        };
        $scope.insertNominee(-1);
        $scope.deleteNominee = function(index){
            $scope.NomineeList.splice(index, 1);
        }
        $scope.calculateAgeForNominee = function(index){
            $scope.NomineeList[index].nominee_age = CustomService.calculateAge(new Date($scope.NomineeList[index].nominee_dob));
        };
        $scope.percentage = 100;
        $scope.presentShare = 0;
        $scope.changedPercentage = function(idx){
            $scope.presentShare = 0;
            for(var i in $scope.NomineeList){
                $scope.presentShare = parseFloat($scope.NomineeList[i].nominee_share) + $scope.presentShare;
                console.log($scope.presentShare, i)
            }
            // for(var i in $scope.NomineeList){
            //     if($scope.presentShare < $scope.percentage){
            //         $scope.NomineeList[i].nominee_share = $scope.presentShare - 100;
            //     }
            //     else if($scope.presentShare > $scope.percentage){
            //         $scope.NomineeList[i].nominee_share = $scope.presentShare - 100;
            //         $scope.clearNextNomineeShareRecords(i, $scope.presentShare);
            //         break;
            //     }else if($scope.presentShare == $scope.percentage){
            //         if($scope.NomineeList[i+1]){
            //             $scope.clearNextNomineeShareRecords(i, $scope.presentShare);
            //         }
            //     }
            // }
        };
        $scope.clearNextNomineeShareRecords = function(idx, presentPercentage){
            for(var i = idx+1; i<$scope.NomineeList.length; i++){
                $scope.NomineeList[i].nominee_share = 0;
            }
        }

        $scope.setUnknownDOBbyAge = function(index, age, field){
            if(field === 'Nominee'){
                $scope.NomineeList[index].nominee_dob = CustomService.getDateForAge(age);
            }
            else if( field === 'Beneficiary'){
                $scope.Beneficiary.benf_date_of_birth = CustomService.getDateForAge(age);
            }else if(field === 'Dependents'){
                $scope.DependentsList[index].depnt_dob = CustomService.getDateForAge(age);
            }
        };


        /* END : Nominee */

        /*  Dependents  */
        $scope.calculateAgeForNominee = function(index){
            $scope.DependentsList[index].depnt_age = CustomService.calculateAge(new Date($scope.DependentsList[index].depnt_dob));
        };
        $scope.DependentsList = [];
        $scope.insertDependent = function() {
            var dependent = {
                "depnt_full_name" : '',
                "depnt_address" : '',
                "depnt_age" : '',
                "depnt_dob" : '',
                "depnt_relationship_with_benf" : ''
            };
            $scope.DependentsList.push(dependent);
        };
        $scope.insertDependent();
        $scope.deleteDependent = function(index){
            $scope.DependentsList.splice(index, 1);
        }

        /*  End  Dependents  */
        $scope.saveNomineeAndDependents = function(){
            $http.post(config.baseUrl + "/beneficiary/createnominee", {"nomineeList":$scope.NomineeList,"master_id":$scope.master_id})
                .then(function(response) {
                });
            $http.post(config.baseUrl + "/beneficiary/createdependents", {"dependentsList":$scope.DependentsList,"master_id":$scope.master_id})
                .then(function(response) {
                });
        };
        
        /* Start : upload related code */

        $scope.AllUploads = [];
        $scope.getFiles = function(){
            $http.get(config.retrieveUrl+"?pathToRetrieve="+$scope.AcknowledgementNumber)
                .then(function(response) {
                    $scope.AllUploads = response.data;
            });
        }

        $scope.RemoveFromList = function(file){
            $http.get(config.deleteUrl+"?pathToDelete="+$scope.AcknowledgementNumber+"/"+file)
                .then(function(response) {
                    if(response.data) $scope.getFiles();
            });
        }

        $scope.UploadFile = function(){
            fileUpload.uploadFileToUrl($scope.myFile, config.uploadUrl, $scope.AcknowledgementNumber);
            $timeout(function () { $scope.getFiles();$("#myFile").val(null); }, 1000);
        };

        /* End : upload related code */

        $http.get(config.baseUrl + "/beneficiary/allbeneficiaries")
            .then(function(response) {
                $scope.AllBeneficiaries = response.data;
                if ($scope.AllBeneficiaries.length <= 0) $scope.ListError = true;
            });

        $scope.$watch('Beneficiary.benf_date_of_birth', function(newVal) {
            if (newVal != null && newVal != "") $scope.Beneficiary.beneficiary_age = CustomService.calculateAge(new Date(newVal));
        });
        $scope.form1submitted = false;
        $scope.Savedata = function() {
            //if($scope.AcknowledgementNumber.length > 0) 
            $http.post(config.baseUrl + "/beneficiary/createbeneficiary", $scope.Beneficiary)
                .then(function(response) {
                    $scope.form1submitted = false;
                    if (response.data.status == "success") {
                        $scope.AcknowledgementNumber = response.data.anumber;
                        $scope.master_id = response.data.id;
                    }
                });
        }

        $scope.SubmitBeneficiary = function() {
            $http.post(config.baseUrl + "/beneficiary/submitbeneficiary", {"id":$scope.master_id})
                .then(function(response) {
                    if (response.data.status == "success") {
                        $window.location.href = config.baseUrl + "/beneficiary/success?id=" + $scope.AcknowledgementNumber;
                    }
                });
        }


        $scope.updateBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/update?id=" + id;
        }

        $scope.ViewBeneficiary = function(id) {
            $window.location.href = config.baseUrl + "/beneficiary/view?id=" + id;
        }

        $scope.Beneficiary = {
            "benf_registration_number": "",
            "benf_registration_old_number": "",
            "benf_acknowledgement_number": "",
            "nationality": 'INDIAN',
            benf_caste: $scope.casteList[3].value
        };


        /* Test data */

        $scope.Beneficiary = config.TestData;

        /* ENd test data */

        $scope.Benf = { sameAsPermanentAddress: false };

        $scope.toggleSameAsPermanentAddress = function() {
            if ($scope.Benf.sameAsPermanentAddress) {
                $scope.Beneficiary.benf_local_address_line1 = $scope.Beneficiary.benf_prmt_address_line1;
                $scope.Beneficiary.benf_local_address_line2 = $scope.Beneficiary.benf_prmt_address_line2;
                $scope.Beneficiary.benf_local_address_taluk = $scope.Beneficiary.benf_prmt_address_taluk;
                $scope.Beneficiary.benf_local_address_district = $scope.Beneficiary.benf_prmt_address_district;
                $scope.Beneficiary.benf_local_address_state = $scope.Beneficiary.benf_prmt_address_state;
                $scope.Beneficiary.benf_local_pincode = $scope.Beneficiary.benf_prmt_address_pincode;
                $scope.Beneficiary.benf_local_address_OfficeList = $scope.Beneficiary.benf_prmt_address_OfficeList;
            } else {
                $scope.Beneficiary.benf_local_address_line1 = "";
                $scope.Beneficiary.benf_local_address_line2 = "";
                $scope.Beneficiary.benf_local_address_taluk = "";
                $scope.Beneficiary.benf_local_address_district = "";
                $scope.Beneficiary.benf_local_address_state = "";
                $scope.Beneficiary.benf_local_pincode = "";
            }
        }
        $scope.setWagesPerMonth = function() {
            if ($scope.Beneficiary.benf_wages_per_day) {
                $scope.Beneficiary.benf_wages_per_month = 30 * parseInt($scope.Beneficiary.benf_wages_per_day);
                $scope.Beneficiary.benf_wages_per_month = parseInt($scope.Beneficiary.benf_wages_per_month);
            } else {
                $scope.Beneficiary.benf_wages_per_month = 0;
            }
        };
        $scope.setWagesPerDay = function() {
            if ($scope.Beneficiary.benf_wages_per_month) {
                $scope.Beneficiary.benf_wages_per_day = parseInt($scope.Beneficiary.benf_wages_per_month) / 30;
                $scope.Beneficiary.benf_wages_per_day = parseInt($scope.Beneficiary.benf_wages_per_day);
            } else {
                $scope.Beneficiary.benf_wages_per_day = 0;
            }
        };

        $scope.getPostalData = function(code, field) {
            if (!code) {
                $scope.resetAddressFields(field);
                return;
            }
            var pincode = code.toString();
            if (pincode.length !== 6) {
                $scope.resetAddressFields(field);
                return;
            }
            var urls = "https://data.gov.in/api/datastore/resource.json?resource_id=6176ee09-3d56-4a3b-8115-21841576b2f6&api-key=cd396da6849bd6d5692d7f47c0141531";
            urls += '&filters[pincode]=' + pincode + '&fields=OfficeName,Taluk,Districtname,statename';
            $http.get(urls)
                .then(function(response) {
                    console.log(response)
                    if (response.data.count === 0) {
                        alert('Invalid Pincode. Please try again');
                        $scope.resetAddressFields(field);
                        if ($scope.Benf.sameAsPermanentAddress) {
                            $scope.resetAddressFields('local');
                        }
                    } else {
                        var pinDetails = response.data.records;
                        $scope.setAddressFields(field, pinDetails);
                        if (field === 'permanent' && $scope.Benf.sameAsPermanentAddress) {
                            $scope.toggleSameAsPermanentAddress();
                        }
                    }
                })
                .catch(function(response) {
                    console.error('POSTAL API error: ', response.status, response.data, response);
                })
                .finally(function(dt) {
                    console.log("finally finished gists", dt);
                });
        };
        $scope.setSameLocalIfTrue = function(field) {
            if ($scope.Benf.sameAsPermanentAddress) {
                if (field === 'line1') {
                    $scope.Beneficiary.benf_local_address_line1 = $scope.Beneficiary.benf_prmt_address_line1;
                } else if (field === 'line2') {
                    $scope.Beneficiary.benf_local_address_line2 = $scope.Beneficiary.benf_prmt_address_line2;
                }
            }
        }

        $scope.setAddressFields = function(field, pinDetails) {

            if (field === 'local') {
                $scope.Beneficiary.benf_local_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.benf_local_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.benf_local_address_state = pinDetails[0].statename;
                var officeList = [];
                for (var i in pinDetails) {
                    officeList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.benf_local_address_OfficeList = officeList;
                $scope.Beneficiary.benf_local_address_line2 = $scope.Beneficiary.benf_local_address_OfficeList[0];
            } else if (field === 'permanent') {
                $scope.Beneficiary.benf_prmt_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.benf_prmt_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.benf_prmt_address_state = pinDetails[0].statename;
                var ofcList = [];
                for (var i in pinDetails) {
                    ofcList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.benf_prmt_address_OfficeList = ofcList;
                $scope.Beneficiary.benf_prmt_address_line2 = $scope.Beneficiary.benf_prmt_address_OfficeList[0];
            } else if (field === 'employer') {
                $scope.Beneficiary.emplr_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.emplr_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.emplr_address_state = pinDetails[0].statename;
                var pOfcList = [];
                for (var i in pinDetails) {
                    pOfcList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.emplr_address_OfficeList = pOfcList;
                $scope.Beneficiary.emplr_address_line2 = $scope.Beneficiary.emplr_address_OfficeList[0];
            }
        };
        $scope.resetAddressFields = function(field) {
            if (field === 'local') {
                $scope.Beneficiary.benf_local_address_taluk = "";
                $scope.Beneficiary.benf_local_address_district = "";
                $scope.Beneficiary.benf_local_address_state = "";
                $scope.Beneficiary.benf_local_address_OfficeList = '';
            } else if (field === 'permanent') {
                $scope.Beneficiary.benf_prmt_address_taluk = "";
                $scope.Beneficiary.benf_prmt_address_district = "";
                $scope.Beneficiary.benf_prmt_address_state = "";
                $scope.Beneficiary.benf_prmt_address_OfficeList = '';
            } else if (field === 'employer') {
                $scope.Beneficiary.emplr_address_taluk = "";
                $scope.Beneficiary.emplr_address_district = "";
                $scope.Beneficiary.emplr_address_state = "";
                $scope.Beneficiary.emplr_address_OfficeList = '';
            }
        }
    }
]);






//Beneficiary Update Controller
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






//Beneficiary Success Controller
app.controller("BeneficiarySuccessController", ['$scope', 'CustomService',
    function($scope, CustomService) {

        $scope.ApplicationReferenceNo = CustomService.getParameterByName('id');

    }
]);





//Beneficiary Details Controller
app.controller("BeneficiaryDetailsController",['$scope','CustomService','config','$http','$window',
    function ($scope,CustomService,config,$http,$window) {    

    $scope.Beneficiary = {};

    var id = CustomService.getParameterByName('id');
    $http.post(config.baseUrl+"/beneficiary/getbeneficiary",{"id":id})
    .then(function(response) {
        if(response.data.benf_date_of_birth != null) response.data.benf_date_of_birth = new Date(response.data.benf_date_of_birth);
        $scope.Beneficiary = response.data;
    });

    $scope.Approve = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/approvebeneficiary",{"id":id,"adminComments":$scope.adminComments})
        .then(function(response) {
            if(response.data == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

    $scope.Reject = function(){
        if($scope.Beneficiary.actionRequired)
        $http.post(config.baseUrl+"/beneficiary/rejectbeneficiary",{"id":id,"adminComments":$scope.adminComments})
        .then(function(response) {
            if(response.data == "success") $window.location.href = config.baseUrl+"/beneficiary";
        });
    }

}]);
/*
Create nominee and dependents for other users failing.
Add ifsc code. at registration page.

Nominee Details 
    Calculate age for entered date and make dob compulsary.

Remove File Upload. (hide infact)

*/