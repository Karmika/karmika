app.controller("BeneficiaryController", ['$scope', '$http', 'config', '$window', 'CustomService', 'fileUpload','$timeout',
    function($scope, $http, config, $window, CustomService, fileUpload, $timeout) {

        $scope.genders = config.genders;
        $scope.martialStatusList = config.martialStatusList;
        $scope.casteList = config.casteList;
        $scope.accountTypeList = config.accountTypeList;
        $scope.natureOfWorks = config.natureOfWorks;
        $scope.bloodGroupList = config.bloodGroupList;
        $scope.IdentityCardTypeList = config.IdentityCardTypeList;
        var id = CustomService.getParameterByName('id');

        $scope.InitializeBasicData= function(){
            $scope.Beneficiary = {
                "benf_registration_number": "",
                "id":"",
                "benf_registration_old_number": "",
                "nationality": 'INDIAN',
                benf_caste: $scope.casteList[3].value
            };

            $scope.DependentsList = [];
            $scope.insertDependent();
            $scope.NomineeList = [];
            $scope.insertNominee(-1);

            /* Test data : Need to remove this */

            $scope.Beneficiary = config.TestData;

            /* ENd test data */
        }

        $scope.insertNominee = function(idx) {
            var individualNominee = {
                "nominee_share": 100
            };
            $scope.NomineeList.push(individualNominee);
            if(idx>=0){
                $scope.changedPercentage(idx);
            }
        };
        $scope.insertDependent = function() {
            $scope.DependentsList.push({});
        };
        /* Start : Certificates logic */

        $scope.Certificates = {};
        $scope.Certificates.Forms = [];
        $scope.Certificates.CertificateTypes = config.CertificateTypes;
        $scope.Certificates.FormType = "V";

        $scope.$watch('FormType', function(newVal){
            if($scope.Certificates.Forms.length > 0)
            angular.forEach($scope.Certificates.Forms, function(value, key) {
                $scope.deleteCertificate(key);
            });
            $scope.Certificates.Forms = [];
            $scope.AddCertificate();
        });

        $scope.AddCertificate = function(){
            $scope.Certificates.Forms.push({
            });
        }

        $scope.deleteCertificate = function(index){
            if($scope.Certificates.Forms[index].id != undefined && $scope.Certificates.Forms[index].id != null)
            $http.post(config.baseUrl+"/beneficiary/deletecertificate",{"id":$scope.Certificates.Forms[index].id})
            .then(function(response) {
                if(response.data.status == "success") $scope.Certificates.Forms.splice(index, 1);
            });
            else $scope.Certificates.Forms.splice(index, 1);
        }

        $scope.SaveCertificate = function(FormType){
            $scope.Certificates.benf_master_id = $scope.Beneficiary.id;
            $http.post(config.baseUrl+"/beneficiary/createcertificates",$scope.Certificates)
            .then(function(response) {
                $scope.FormatCertificates(response.data.Forms);
            });
        }

        /* End : Certificates logic */

        /* Start : Payment logic */

        $scope.Payment = {};
        $scope.Payment.amount = 25;
        $scope.Payment.payment_for = {"entity_id":2,"entity_value":"Application Fee"};
        $scope.Payment.payment_status = {"entity_id":2,"entity_value":"Paid"};
        $scope.paymentModes = {};
        $scope.paymentStatuses = {};
        $scope.paymentFors = [];

        CustomService.SeedData('payment_mode').then(function(data) {
            $scope.paymentModes = data;
        });

        CustomService.SeedData('payment_status').then(function(data) {
            $scope.paymentStatuses = data;
        });

        CustomService.SeedData('payment_for').then(function(data) {
            $scope.paymentFors = data;
        });

        $scope.$watch('Payment.payment_mode',function(newVal){
            if(newVal != undefined && (newVal.entity_value == "DD" || newVal.entity_value == "Cheque"))
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
            paymentDetails.benf_master_id = $scope.Beneficiary.id;
            var action = "createpayment";
            if($scope.Payment.id != undefined && $scope.Payment.id != null) action = "updatepayment";
            $http.post(config.baseUrl+"/payment/"+action,paymentDetails)
            .then(function(response) {
                if(response.data.status == "success" && action == "createpayment") $scope.Payment.id = response.data.id;
            });
        }

        /* End : Payment Logic */

        /* Start : Load data */

        if(id)
            $http.post(config.baseUrl+"/beneficiary/getbeneficiaryalldata",{"id":id})
            .then(function(response) {
                $scope.Beneficiary = response.data.Beneficiary;
                $scope.setPOLimitsofAddress();
                $scope.NomineeList = response.data.NomineeList;
                if($scope.NomineeList.length == 0){
                    $scope.insertNominee(-1);
                }
                $scope.DependentsList = response.data.DependentsList;
                if($scope.DependentsList.length == 0){
                    $scope.insertDependent();
                }
                if(response.data.Payment != null && response.data.Payment != undefined){
                    $scope.Payment = response.data.Payment;
                    $scope.FormatPayment();
                }
                $scope.Certificates.FormType = "V";
                if(response.data.Certificates.length > 0) $scope.Certificates.Forms = response.data.Certificates;
                $scope.FormatNomineeData();
                $scope.FormatDependentData();
                $scope.FormatBeneficiaryData();
                $scope.FormatCertificatesDates();
            });
        else $scope.InitializeBasicData();

        $scope.setPOLimitsofAddress = function(){
            $scope.Beneficiary.benf_local_address_line2
            $scope.getPostalData($scope.Beneficiary.benf_local_pincode, 'local', false);
            $scope.getPostalData($scope.Beneficiary.benf_prmt_address_pincode, 'permanent', false);
            $scope.getPostalData($scope.Beneficiary.emplr_address_pincode, 'employer', false);
        }
        /* End : Load data */

        /* Start : data format functions */

        $scope.FormatNomineeData = function(){
            angular.forEach($scope.NomineeList, function(value, key) {
                $scope.NomineeList[key].nominee_dob = new Date($scope.NomineeList[key].nominee_dob);
            });
        }
        $scope.FormatDependentData = function(){
            angular.forEach($scope.DependentsList, function(value, key) {
                $scope.DependentsList[key].depnt_dob = new Date($scope.DependentsList[key].depnt_dob);
            });
        }
        $scope.FormatCertificates = function(forms){
            angular.forEach(forms, function(value, key) {
                $scope.Certificates.Forms[key].id = forms[key].id;
            });
        }
        $scope.FormatCertificatesDates = function(){
            angular.forEach($scope.Certificates.Forms, function(value, key) {
                if($scope.Certificates.Forms[key].benf_work_start_date != null && $scope.Certificates.Forms[key].benf_work_start_date != "")
                    $scope.Certificates.Forms[key].benf_work_start_date = new Date($scope.Certificates.Forms[key].benf_work_start_date);
                if($scope.Certificates.Forms[key].benf_work_end_date != null && $scope.Certificates.Forms[key].benf_work_end_date != "")
                    $scope.Certificates.Forms[key].benf_work_end_date = new Date($scope.Certificates.Forms[key].benf_work_end_date);
            });
        }
        $scope.FormatBeneficiaryData = function(){
            if($scope.Beneficiary.benf_date_of_birth != null) $scope.Beneficiary.benf_date_of_birth = new Date($scope.Beneficiary.benf_date_of_birth);
            if($scope.Beneficiary.benf_date_of_employment != null) $scope.Beneficiary.benf_date_of_employment = new Date($scope.Beneficiary.benf_date_of_employment);
        }

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
        /* End : data format functions */

        /* Nominee */
        $scope.deleteNominee = function(index){
            $scope.NomineeList.splice(index, 1);
        }
        $scope.calculateAgeForNominee = function(index){
            $scope.NomineeList[index].nominee_age = CustomService.calculateAge(new Date($scope.NomineeList[index].nominee_dob));
        };
        $scope.calculateAgeForDependent = function(idx){
            $scope.DependentsList[idx].depnt_age = CustomService.calculateAge(new Date($scope.DependentsList[idx].depnt_dob));
        }
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
        $scope.deleteDependent = function(index){
            $scope.DependentsList.splice(index, 1);
        }

        /*  End  Dependents  */
        $scope.saveNomineeAndDependents = function(){
            $http.post(config.baseUrl + "/beneficiary/createnominee", {"nomineeList":$scope.NomineeList,"id":$scope.Beneficiary.id})
                .then(function(response) {
                    $scope.NomineeList = response.data.nomineeList;
                });

            $http.post(config.baseUrl + "/beneficiary/createdependents", {"dependentsList":$scope.DependentsList,"id":$scope.Beneficiary.id})
                .then(function(response) {
                    $scope.DependentsList = response.data.dependentsList;
                });
            $scope.FormatNomineeData();
            $scope.FormatDependentData();
        };
        
        /* Start : upload related code */
/*
        $scope.AllUploads = [];
        $scope.getFiles = function(){
            $http.get(config.retrieveUrl+"?pathToRetrieve="+$scope.Beneficiary.benf_acknowledgement_number)
                .then(function(response) {
                    $scope.AllUploads = response.data;
            });
        }

        $scope.RemoveFromList = function(file){
            $http.get(config.deleteUrl+"?pathToDelete="+$scope.Beneficiary.benf_acknowledgement_number+"/"+file)
                .then(function(response) {
                    if(response.data) $scope.getFiles();
            });
        }

        $scope.UploadFile = function(){
            fileUpload.uploadFileToUrl($scope.myFile, config.uploadUrl, $scope.Beneficiary.benf_acknowledgement_number);
            $timeout(function () { $scope.getFiles();$("#myFile").val(null); }, 1000);
        };
*/
        /* End : upload related code */

        $scope.$watch('Beneficiary.benf_date_of_birth', function(newVal) {
            if (newVal != null && newVal != "") $scope.Beneficiary.beneficiary_age = CustomService.calculateAge(new Date(newVal));
        });
        $scope.form1submitted = false;
        $scope.Savedata = function() {
            var action = "createbeneficiary";
            if($scope.Beneficiary.id != undefined && $scope.Beneficiary.id != 0) action = "updatebeneficiary";
            
            $http.post(config.baseUrl + "/beneficiary/"+action, $scope.Beneficiary)
                .then(function(response) {
                    $scope.form1submitted = false;
                    if (response.data.status == "success" && action == "createbeneficiary") {
                        $scope.Beneficiary.id = response.data.id;
                    }
                });
        }

        $scope.SubmitBeneficiary = function() {
            $http.post(config.baseUrl + "/beneficiary/submitbeneficiary", {"id":$scope.Beneficiary.id})
                .then(function(response) {
                    if (response.data.status == "success") {
                        $window.location.href = config.baseUrl + "/beneficiary/success?id=" + response.data.anumber;
                    }
                });
        }

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

        $scope.getPostalData = function(code, field, retrive) {
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
                    if (response.data.count === 0) {
                        alert('Invalid Pincode. Please try again');
                        $scope.resetAddressFields(field);
                        if ($scope.Benf.sameAsPermanentAddress) {
                            $scope.resetAddressFields('local');
                        }
                    } else {
                        var pinDetails = response.data.records;
                        $scope.setAddressFields(field, pinDetails, retrive);
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

        $scope.setAddressFields = function(field, pinDetails, retrive) {

            if (field === 'local') {
                $scope.Beneficiary.benf_local_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.benf_local_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.benf_local_address_state = pinDetails[0].statename;
                var officeList = [];
                for (var i in pinDetails) {
                    officeList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.benf_local_address_OfficeList = officeList;
                if(retrive == false){
                    var line2 = $scope.Beneficiary.benf_local_address_line2;
                    for(var i in officeList){
                        if(officeList[i].OfficeName === line2){
                            $scope.Beneficiary.benf_local_address_line2 = $scope.Beneficiary.benf_local_address_OfficeList[i]
                        }
                    }
                }
                else {
                    $scope.Beneficiary.benf_local_address_line2 = $scope.Beneficiary.benf_local_address_OfficeList[0];
                }
            } else if (field === 'permanent') {
                $scope.Beneficiary.benf_prmt_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.benf_prmt_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.benf_prmt_address_state = pinDetails[0].statename;
                var ofcList = [];
                for (var i in pinDetails) {
                    ofcList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.benf_prmt_address_OfficeList = ofcList;
                if(retrive == false){
                    var line2 = $scope.Beneficiary.benf_prmt_address_line2;
                    for(var i in ofcList){
                        if(ofcList[i].OfficeName === line2){
                            $scope.Beneficiary.benf_prmt_address_line2 = $scope.Beneficiary.benf_prmt_address_OfficeList[i]
                        }
                    }
                }
                else {
                    $scope.Beneficiary.benf_prmt_address_line2 = $scope.Beneficiary.benf_prmt_address_OfficeList[0];
                }
            } else if (field === 'employer') {
                $scope.Beneficiary.emplr_address_taluk = pinDetails[0].Taluk;
                $scope.Beneficiary.emplr_address_district = pinDetails[0].Districtname;
                $scope.Beneficiary.emplr_address_state = pinDetails[0].statename;
                var pOfcList = [];
                for (var i in pinDetails) {
                    pOfcList.push(pinDetails[i].OfficeName);
                }
                $scope.Beneficiary.emplr_address_OfficeList = pOfcList;
                if(retrive == false){
                    var line2 = $scope.Beneficiary.benf_prmt_address_line2;
                    for(var i in pOfcList){
                        if(pOfcList[i].OfficeName === line2){
                            $scope.Beneficiary.emplr_address_line2 = $scope.Beneficiary.emplr_address_OfficeList[i];
                        }
                    }
                }
                else {
                    $scope.Beneficiary.emplr_address_line2 = $scope.Beneficiary.emplr_address_OfficeList[0];
                }
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