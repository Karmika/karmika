<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use frontend\models\BeneficiaryMaster;

/**
 * This is the model class for table "selection_seed_data".
 *
 * @property string $id
 * @property string $entity_type
 * @property integer $entity_id
 * @property string $entity_value
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $updated_by
 * @property integer $is_deleted
 */
class Services extends Model
{
    /**
     * @inheritdoc
     */
    public function GetNewBeneficiaryAcknowledgementNumber()
    {
        $arry = BeneficiaryMaster::find()
        ->select(['id','benf_acknowledgement_number'])
        ->where(['id' => BeneficiaryMaster::find()->max('id')])
        ->one();
        $StringLetters = "BNG";
        if(count($arry) < 1) return "BNG000000001";
        $result = ArrayHelper::toArray($arry,'id','benf_acknowledgement_number');
        $result['benf_acknowledgement_number'] = str_replace($StringLetters,"",$result['benf_acknowledgement_number']);
        $result['benf_acknowledgement_number'] += 1;
        while(strlen($result['benf_acknowledgement_number']) != 9){
            $result['benf_acknowledgement_number'] = "0".$result['benf_acknowledgement_number'];
        }
        return $StringLetters.$result['benf_acknowledgement_number'];
    }

    public function GetNewBeneficiaryRegistrationNumber()
    {
        $arry = BeneficiaryMaster::find()
        ->select(['id','benf_registration_number'])
        ->where(['id' => BeneficiaryMaster::find()->where(['not', ['benf_registration_number' => null]])->max('id')])
        ->one();
        if(count($arry) < 1) return "0000000001";
        $result = ArrayHelper::toArray($arry,'id','benf_registration_number');
        $result['benf_registration_number'] += 1;
        while(strlen($result['benf_registration_number']) != 10){
            $result['benf_registration_number'] = "0".$result['benf_registration_number'];
        }
        return $result['benf_registration_number'];
    }

    public function ExecuteSQLQuery($query)
    {        
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($query);
        return $command->queryAll();
    } 
}
