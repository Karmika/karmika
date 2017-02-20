<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "beneficiary_master".
 *
 * @property integer $id
 * @property string $benf_first_name
 * @property string $benf_middle_name
 * @property string $benf_last_name
 * @property string $benf_mobile_no
 * @property string $benf_alternate_mobile_no
 * @property string $benf_date_of_birth
 * @property integer $beneficiary_age
 * @property string $benf_sex
 * @property string $nationality
 * @property string $benf_caste
 * @property string $benf_martial_status
 * @property string $benf_blood_group
 * @property string $benf_local_address_line1
 * @property string $benf_local_address_line2
 * @property string $benf_local_address_taluk
 * @property string $benf_local_address_district
 * @property string $benf_local_address_state
 * @property integer $benf_local_pincode
 * @property string $benf_prmt_address_line1
 * @property string $benf_prmt_address_line2
 * @property string $benf_prmt_address_taluk
 * @property string $benf_prmt_address_district
 * @property string $benf_prmt_address_state
 * @property integer $benf_prmt_address_pincode
 * @property string $employer_full_name
 * @property string $emplr_address_line1
 * @property string $emplr_address_line2
 * @property string $emplr_address_taluk
 * @property string $emplr_address_district
 * @property string $emplr_address_state
 * @property integer $emplr_address_pincode
 * @property string $benf_nature_of_work
 * @property string $benf_date_of_employment
 * @property integer $benf_wages_per_day
 * @property integer $benf_wages_per_month
 * @property integer $benf_bank_account_number
 * @property string $benf_bank_account_type
 * @property integer $benf_bank_name
 * @property integer $benf_bank_branch
 * @property integer $benf_bank_ifsc
 * @property string $created_date
 * @property integer $created_by_user_id
 * @property string $updated_date
 * @property integer $updated_by_user_id
 * @property string $benf_application_status
 * @property string $benf_acknowledgement_number
 * @property string $benf_registration_number
 * @property string $benf_registration_old_number
 * @property string $admin_comments
 */
class BeneficiaryMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beneficiary_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_mobile_no', 'benf_alternate_mobile_no', 'beneficiary_age', 'benf_local_pincode', 'benf_prmt_address_pincode', 'emplr_address_pincode', 'benf_wages_per_day', 'benf_wages_per_month', 'benf_bank_account_number', 'benf_bank_name', 'benf_bank_branch', 'benf_bank_ifsc', 'created_by_user_id', 'updated_by_user_id'], 'integer'],
            [['benf_date_of_birth', 'benf_date_of_employment', 'created_date', 'updated_date'], 'safe'],
            [['benf_sex', 'benf_caste', 'benf_martial_status', 'benf_blood_group', 'benf_nature_of_work', 'benf_bank_account_type', 'benf_application_status', 'benf_acknowledgement_number', 'admin_comments'], 'string'],
            [['created_by_user_id', 'updated_by_user_id'], 'required'],
            [['benf_first_name', 'benf_middle_name', 'benf_last_name', 'nationality', 'benf_local_address_line1', 'benf_local_address_line2', 'benf_local_address_taluk', 'benf_local_address_district', 'benf_local_address_state', 'benf_prmt_address_line1', 'benf_prmt_address_line2', 'benf_prmt_address_taluk', 'benf_prmt_address_district', 'benf_prmt_address_state', 'emplr_address_line1', 'emplr_address_line2', 'emplr_address_taluk', 'emplr_address_district', 'emplr_address_state'], 'string', 'max' => 25],
            [['employer_full_name'], 'string', 'max' => 40],
            [['benf_registration_number', 'benf_registration_old_number'], 'string', 'max' => 35],
            [['benf_registration_number', 'benf_registration_old_number'], 'unique', 'targetAttribute' => ['benf_registration_number', 'benf_registration_old_number'], 'message' => 'The combination of Benf Registration Number and Benf Registration Old Number has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'benf_first_name' => 'Benf First Name',
            'benf_middle_name' => 'Benf Middle Name',
            'benf_last_name' => 'Benf Last Name',
            'benf_mobile_no' => 'Benf Mobile No',
            'benf_alternate_mobile_no' => 'Benf Alternate Mobile No',
            'benf_date_of_birth' => 'Benf Date Of Birth',
            'beneficiary_age' => 'Beneficiary Age',
            'benf_sex' => 'Benf Sex',
            'nationality' => 'Nationality',
            'benf_caste' => 'Benf Caste',
            'benf_martial_status' => 'Benf Martial Status',
            'benf_blood_group' => 'Benf Blood Group',
            'benf_local_address_line1' => 'Benf Local Address Line1',
            'benf_local_address_line2' => 'Benf Local Address Line2',
            'benf_local_address_taluk' => 'Benf Local Address Taluk',
            'benf_local_address_district' => 'Benf Local Address District',
            'benf_local_address_state' => 'Benf Local Address State',
            'benf_local_pincode' => 'Benf Local Pincode',
            'benf_prmt_address_line1' => 'Benf Prmt Address Line1',
            'benf_prmt_address_line2' => 'Benf Prmt Address Line2',
            'benf_prmt_address_taluk' => 'Benf Prmt Address Taluk',
            'benf_prmt_address_district' => 'Benf Prmt Address District',
            'benf_prmt_address_state' => 'Benf Prmt Address State',
            'benf_prmt_address_pincode' => 'Benf Prmt Address Pincode',
            'employer_full_name' => 'Employer Full Name',
            'emplr_address_line1' => 'Emplr Address Line1',
            'emplr_address_line2' => 'Emplr Address Line2',
            'emplr_address_taluk' => 'Emplr Address Taluk',
            'emplr_address_district' => 'Emplr Address District',
            'emplr_address_state' => 'Emplr Address State',
            'emplr_address_pincode' => 'Emplr Address Pincode',
            'benf_nature_of_work' => 'Benf Nature Of Work',
            'benf_date_of_employment' => 'Benf Date Of Employment',
            'benf_wages_per_day' => 'Benf Wages Per Day',
            'benf_wages_per_month' => 'Benf Wages Per Month',
            'benf_bank_account_number' => 'Benf Bank Account Number',
            'benf_bank_account_type' => 'Benf Bank Account Type',
            'benf_bank_name' => 'Benf Bank Name',
            'benf_bank_branch' => 'Benf Bank Branch',
            'benf_bank_ifsc' => 'Benf Bank Ifsc',
            'created_date' => 'Created Date',
            'created_by_user_id' => 'Created By User ID',
            'updated_date' => 'Updated Date',
            'updated_by_user_id' => 'Updated By User ID',
            'benf_application_status' => 'Benf Application Status',
            'benf_acknowledgement_number' => 'Benf Acknowledgement Number',
            'benf_registration_number' => 'Benf Registration Number',
            'benf_registration_old_number' => 'Benf Registration Old Number',
            'admin_comments' => 'Admin Comments',
        ];
    }
}
