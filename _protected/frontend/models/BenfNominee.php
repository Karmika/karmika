<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "benf_nominee".
 *
 * @property string $id
 * @property string $benf_master_id
 * @property string $nominee_full_name
 * @property string $nominee_address
 * @property integer $nominee_age
 * @property string $nominee_dob
 * @property integer $nominee_share
 * @property string $nominee_relationship_with_benf
 * @property string $last_updated_by_user_id
 * @property string $last_updated_time
 */
class BenfNominee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benf_nominee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_master_id', 'nominee_full_name', 'nominee_address', 'nominee_age', 'nominee_dob', 'nominee_share', 'last_updated_by_user_id'], 'required'],
            [['benf_master_id', 'nominee_age', 'nominee_share', 'last_updated_by_user_id'], 'integer'],
            [['nominee_address'], 'string'],
            [['nominee_dob', 'last_updated_time'], 'safe'],
            [['nominee_full_name'], 'string', 'max' => 100],
            [['nominee_relationship_with_benf'], 'string', 'max' => 30],
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
            'nominee_full_name' => 'Nominee Full Name',
            'nominee_address' => 'Nominee Address',
            'nominee_age' => 'Nominee Age',
            'nominee_dob' => 'Nominee Dob',
            'nominee_share' => 'Nominee Share',
            'nominee_relationship_with_benf' => 'Nominee Relationship With Benf',
            'last_updated_by_user_id' => 'Last Updated By User ID',
            'last_updated_time' => 'Last Updated Time',
        ];
    }
}
