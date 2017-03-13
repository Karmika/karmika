<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "benf_payments".
 *
 * @property integer $id
 * @property integer $benf_master_id
 * @property integer $amount
 * @property string $date_of_payment
 * @property string $notes
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 * @property string $created_date
 * @property string $updated_date
 */
class BenfPayments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benf_payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['benf_master_id', 'amount', 'date_of_payment', 'created_by_user_id', 'updated_by_user_id'], 'required'],
            [['benf_master_id', 'amount', 'created_by_user_id', 'updated_by_user_id'], 'integer'],
            [['date_of_payment', 'created_date', 'updated_date'], 'safe'],
            [['notes'], 'string'],
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
            'amount' => 'Amount',
            'date_of_payment' => 'Date Of Payment',
            'notes' => 'Notes',
            'created_by_user_id' => 'Created By User ID',
            'updated_by_user_id' => 'Updated By User ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
