<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "benf_payments".
 *
 * @property integer $id
 * @property integer $benf_master_id
 * @property integer $payment_reference_id
 * @property integer $payment_mode
 * @property string $payment_date
 * @property integer $payment_status
 * @property string $amount
 * @property integer $payment_for
 * @property string $chequeordd_no
 * @property string $bank_name
 * @property string $bank_payment_date
 * @property string $ref_1
 * @property string $ref_2
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
            [['benf_master_id', 'created_by_user_id', 'updated_by_user_id'], 'required'],
            [['benf_master_id', 'payment_reference_id', 'payment_mode', 'payment_status', 'amount', 'payment_for', 'created_by_user_id', 'updated_by_user_id'], 'integer'],
            [['payment_date', 'bank_payment_date', 'created_date', 'updated_date'], 'safe'],
            [['notes'], 'string'],
            [['chequeordd_no'], 'string', 'max' => 64],
            [['bank_name'], 'string', 'max' => 32],
            [['ref_1', 'ref_2'], 'string', 'max' => 45],
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
            'payment_reference_id' => 'Payment Reference ID',
            'payment_mode' => 'Payment Mode',
            'payment_date' => 'Payment Date',
            'payment_status' => 'Payment Status',
            'amount' => 'Amount',
            'payment_for' => 'Payment For',
            'chequeordd_no' => 'Chequeordd No',
            'bank_name' => 'Bank Name',
            'bank_payment_date' => 'Bank Payment Date',
            'ref_1' => 'Ref 1',
            'ref_2' => 'Ref 2',
            'notes' => 'Notes',
            'created_by_user_id' => 'Created By User ID',
            'updated_by_user_id' => 'Updated By User ID',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
