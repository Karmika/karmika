<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property integer $id
 * @property integer $benf_master_id
 * @property integer $payment_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 * @property string $created_date
 * @property string $updated_date
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_master_id', 'payment_id', 'start_date', 'end_date', 'created_by_user_id', 'updated_by_user_id'], 'required'],
            [['benf_master_id', 'payment_id', 'created_by_user_id', 'updated_by_user_id'], 'integer'],
            [['start_date', 'end_date', 'created_date', 'updated_date'], 'safe'],
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
            'payment_id' => 'Payment ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_by_user_id' => 'Created By User ID',
            'updated_by_user_id' => 'Updated By User ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
