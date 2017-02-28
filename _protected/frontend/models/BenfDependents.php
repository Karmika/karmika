<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "benf_dependents".
 *
 * @property string $id
 * @property string $benf_master_id
 * @property string $depnt_full_name
 * @property string $depnt_address
 * @property integer $depnt_age
 * @property string $depnt_dob
 * @property string $depnt_relationship_with_benf
 * @property string $last_updated_by_user_id
 * @property string $last_updated_time
 */
class BenfDependents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benf_dependents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_master_id', 'depnt_full_name', 'depnt_address', 'depnt_age', 'depnt_dob', 'depnt_relationship_with_benf', 'last_updated_by_user_id'], 'required'],
            [['benf_master_id', 'depnt_age', 'last_updated_by_user_id'], 'integer'],
            [['depnt_address'], 'string'],
            [['depnt_dob', 'last_updated_time'], 'safe'],
            [['depnt_full_name'], 'string', 'max' => 100],
            [['depnt_relationship_with_benf'], 'string', 'max' => 25],
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
            'depnt_full_name' => 'Depnt Full Name',
            'depnt_address' => 'Depnt Address',
            'depnt_age' => 'Depnt Age',
            'depnt_dob' => 'Depnt Dob',
            'depnt_relationship_with_benf' => 'Depnt Relationship With Benf',
            'last_updated_by_user_id' => 'Last Updated By User ID',
            'last_updated_time' => 'Last Updated Time',
        ];
    }
}
