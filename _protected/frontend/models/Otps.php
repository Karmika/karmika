<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "otps".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $otp
 * @property string $created_date
 */
class Otps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'otp'], 'required'],
            [['created_date'], 'safe'],
            [['mobile'], 'string', 'max' => 12],
            [['otp'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'otp' => 'Otp',
            'created_date' => 'Created Date',
        ];
    }
}
