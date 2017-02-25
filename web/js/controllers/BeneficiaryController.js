//Beneficiary Controller
app.controller("BeneficiaryController", ['$scope', '$http', 'config', '$window', 'CustomService', 'FileUploader',
    function($scope, $http, config, $window, CustomService, FileUploader) {

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

        $scope.AcknowledgementNumber = "";

        /* Nominee */

        var individualNominee = {
            "nominee_full_name": '',
            "nominee_address": '',
            "nominee_age": '',
            "nominee_dob": '',
            "nominee_share": 0
        };
        $scope.NomineeList = [];
        $scope.insertNominee = function() {
            var nomineeObj;
            angular.copy(nomineeObj, individualNominee);
            $scope.NomineeList.push(nomineeObj);
        };

        $scope.insertNominee();

        /* END : Nominee */

        /* Start : upload related code */
        $scope.uploader = new FileUploader();
        $scope.InitializeUpload = function() {
            $scope.uploader = new FileUploader({
                url: config.baseUrl + config.uploadRootFolder + "?pathToUpload=" + $scope.AcknowledgementNumber
            });
            $scope.UploadFiles = function() {
                uploader.uploadAll();
            }
        }

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
            // alert('being saved');
            // return;
            $http.post(config.baseUrl + "/beneficiary/createbeneficiary", $scope.Beneficiary)
                .then(function(response) {
                    $scope.form1submitted = false;
                    if (response.data.status == "success") {
                        //$scope.UploadFiles();
                        $scope.AcknowledgementNumber = response.data.id;
                        $scope.InitializeUpload();
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