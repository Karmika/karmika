<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "benf_emp_certificate".
 *
 * @property string $id
 * @property string $benf_master_id
 * @property string $benf_employer_full_name
 * @property string $benf_present_work_address
 * @property string $benf_present_project_name
 * @property string $emp_union_full_name
 * @property string $emp_union_branch_address
 * @property string $benf_work_start_date
 * @property string $benf_work_end_date
 * @property string $emp_union_address
 * @property string $last_updated_by_user_id
 * @property string $last_updated_time
 */
class BenfEmpCertificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benf_emp_certificate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_master_id', 'benf_employer_full_name', 'benf_present_work_address', 'benf_present_project_name', 'last_updated_by_user_id'], 'required'],
            [['benf_master_id', 'last_updated_by_user_id'], 'integer'],
            [['benf_present_work_address', 'emp_union_branch_address', 'emp_union_address'], 'string'],
            [['benf_work_start_date', 'benf_work_end_date', 'last_updated_time'], 'safe'],
            [['benf_employer_full_name', 'benf_present_project_name', 'emp_union_full_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'benf_master_id' => 'Benf Master ID',
            'benf_employer_full_name' => 'Benf Employer Full Name',
            'benf_present_work_address' => 'Benf Present Work Address',
            'benf_present_project_name' => 'Benf Present Project Name',
            'emp_union_full_name' => 'Emp Union Full Name',
            'emp_union_branch_address' => 'Emp Union Branch Address',
            'benf_work_start_date' => 'Benf Work Start Date',
            'benf_work_end_date' => 'Benf Work End Date',
            'emp_union_address' => 'Emp Union Address',
            'last_updated_by_user_id' => 'Last Updated By User ID',
            'last_updated_time' => 'Last Updated Time',
        ];
    }
}
