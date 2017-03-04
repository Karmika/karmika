var app = angular.module('app',['ui.router','ngAnimate', 'ui.bootstrap','angularUtils.directives.dirPagination']);
app.constant('config', {
    baseUrl: "/karmika",
    uploadUrl : "/karmika/web/others/upload.php",
    retrieveUrl : "/karmika/web/others/retrieveFiles.php",
    deleteUrl : "/karmika/web/others/delete.php",
    casteList: [
            {id: "Schedule Caste (SC)", 'value': 'Schedule Caste (SC)' }, 
            {id: "Schedule Tribe (ST)", 'value': 'Schedule Tribe (ST)' }, 
            {id: "Other Backward Caste (OBC)", 'value': 'Other Backward Caste (OBC)' }, 
            {id: "General (Others)", 'value': 'General (Others)' }, 
            ],
    accountTypeList : [
            {id: "SAVINGS", 'value': 'SAVINGS' }, 
            {id: "JAN-DAN", 'value': 'JAN-DAN' }, 
            {id: "CURRENT", 'value': 'CURRENT' }, 
            ],
    IdentityCardTypeList : [
            {id: "EPIC", 'value': 'EPIC' }, 
            {id: "ADHAR", 'value': 'ADHAR' }, 
            {id: "NPR", 'value': 'NPR' }, 
            ], 
    natureOfWorks : [
            {id: 'MASON', value : 'MASON'},
            {id: 'BARBENDING', value : 'BARBENDING'},
            {id: 'CARPENTRY' , value : 'CARPENTRY'},
            {id: 'ELECTRICIAN' , value : 'ELECTRICIAN'},
            {id: 'CENTRING', value : 'CENTRING'},
            {id: 'HELPER', value : 'HELPER'},
            {id: 'PLUMBING' , value : 'PLUMBING'},
            {id:'OTHERS' , value : 'OTHERS'}
            ],
    genders:[
            {"entity_id":"MALE","entity_value":"Male"},
            {"entity_id":"FEMALE","entity_value":"Female"},
            {"entity_id":"OTHERS","entity_value":"Other"}
            ],
    martialStatusList:[
            {"entity_id":"SINGLE","entity_value":"Unmarried"},
            {"entity_id":"MARRIED","entity_value":"Married"}
            // {"entity_id":"Widowed","entity_value":"Widowed"},
            // {"entity_id":"Divorced / Separated","entity_value":"Divorced / Separated"}
            ],
    bloodGroupList : [
            {"entity_id":'A+', 'entity_value':'A+'},
            {"entity_id":'A-', 'entity_value':'A-'},
            {"entity_id":'B+', 'entity_value':'B+'},
            {"entity_id":'B-', 'entity_value':'B-'},
            {"entity_id":'AB+', 'entity_value':'AB+'},
            {"entity_id":'AB-', 'entity_value':'AB-'},
            {"entity_id":'O+', 'entity_value':'O+'},
            {"entity_id":'O-', 'entity_value':'O-'}
        ],
    perPageRowSelectionData:[
    		100,50,20,10,5,2
    		],
    TestData : {
              "benf_application_status": "APPLIED",
              "benf_registration_number": null,
              "benf_registration_old_number": "",
              "benf_acknowledgement_number": "",
              "nationality": "INDIAN",
              "benf_caste": "General (Others)",
              "benf_first_name": "Sravan",
              "benf_middle_name": "Vanteru",
              "benf_last_name": "Kumar",
              "benf_prmt_address_line1": "Bangalore",
              "benf_prmt_address_line2": "Bangalore",
              "benf_prmt_address_pincode": "560037",
              "benf_prmt_address_taluk": "Bangalore North",
              "benf_prmt_address_district": "Bangalore",
              "benf_prmt_address_state": "KARNATAKA",
              "benf_mobile_no": "8892233720",
              "benf_date_of_birth": new Date("1991-07-26"),
              "beneficiary_age": 25,
              "benf_sex": "MALE",
              "benf_local_address_line1": "Bangalore",
              "benf_local_address_line2": "Bangalore",
              "benf_local_address_taluk": "Bangalore North",
              "benf_local_address_district": "Bangalore",
              "benf_local_address_state": "KARNATAKA",
              "benf_local_pincode": "560037",
              "employer_full_name": "Happiest Minds Techonologies",
              "benf_nature_of_work": "PLUMBING",
              "emplr_address_line1": "Bangalore",
              "emplr_address_line2": "Bangalore",
              "emplr_address_pincode": "560037",
              "emplr_address_taluk": "Bangalore North",
              "emplr_address_district": "Bangalore",
              "emplr_address_state": "KARNATAKA",
              "benf_date_of_employment": new Date("2014-02-07"),
              "benf_wages_per_day": "100",
              "benf_wages_per_month": 3000,
              "benf_martial_status": "SINGLE",
              "benf_blood_group": "A+",
              "benf_bank_account_number": "010101010101",
              "benf_bank_name": "ICIC Bank",
              "benf_bank_branch": "ECity Bangalore",
              "benf_bank_account_type":"SAVINGS",
              "benf_identity_card_type":"EPIC",
              "benf_identity_card_number":"213131313"
            }
});