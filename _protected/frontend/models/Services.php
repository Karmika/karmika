<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use frontend\models\BeneficiaryMaster;
use frontend\models\SelectionSeedData;
use frontend\models\Otps;

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
    public static function CustomFormatArray($result,$i=1){
        $newArray = array();
        foreach ($result as $key=>$val)
        {
            $newArray[$i++] = array('entity_id' => $key,'entity_value' => $val);
        }
        return $newArray;
    }
    
    public static function getObjectForSelectBox($id,$columnName){
        $details = SelectionSeedData::find()
            ->select(['entity_id', 'entity_value'])
            ->where(['entity_id' => $id,'entity_type'=>$columnName])
            ->one();
        return ArrayHelper::toArray($details,'*');
    }
    
    public function GetNewBeneficiaryAcknowledgementNumber()
    {
        $arry = BeneficiaryMaster::find()
        ->select(['id','benf_acknowledgement_number'])
        ->where(['id' => BeneficiaryMaster::find()->where(['not', ['benf_acknowledgement_number' => null]])->max('id')])
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

    public function GetNewBeneficiaryApplicationNumber()
    {
        $arry = BeneficiaryMaster::find()
        ->select(['id','benf_application_number'])
        ->where(['id' => BeneficiaryMaster::find()->where(['not', ['benf_application_number' => null]])->max('id')])
        ->one();
        if(count($arry) < 1) return "0000000001";
        $result = ArrayHelper::toArray($arry,'id','benf_application_number');
        $result['benf_application_number'] += 1;
        while(strlen($result['benf_application_number']) != 10){
            $result['benf_application_number'] = "0".$result['benf_application_number'];
        }
        return $result['benf_application_number'];
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

    public function GetPaymentByBeneficiaryOrPaymentId($id,$field){
        $details = BenfPayments::find()
            ->select(['payment_date','payment_mode','payment_status','payment_for','payment_reference_id','amount','notes','chequeordd_no','bank_name','ifsc_code','id'])
            ->where([$field => $id])
            ->one();
        $result = NULL;    
        if($details != null) $result = ArrayHelper::toArray($details,'*');
        return $result;
    }

    public function getRegistrationFee($id){
        $payment = BenfPayments::find()
            ->select(['amount'])
            ->where(['benf_master_id' => $id,'payment_for'=>$this->RegistrationFeeTypeId])
            ->one();
        if($payment != null) return $payment['amount'];
        else return 0;
    }

    public function getSubscriptionFee($id){
        $payments = BenfPayments::find()
            ->select(['amount'])
            ->where(['benf_master_id' => $id,'payment_for'=>$this->SubscriptionFeeTypeId])
            ->all();
        if(count($payments) > 0){
            $total = 0;
            foreach($payments as $value){
                $total += (int)$value['amount'];
            }
            return $total;
        }else return 0;
    }

    public function ExecuteSQLQuery($query)
    {        
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($query);
        return $command->queryAll();
    } 

    public function ExecuteSQL($query)
    {        
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($query);
        return $command->execute();
    } 

    public function SendSMS($mobile,$msg)
    {   
        $url = "http://203.212.70.200/smpp/sendsms?username=kbocwbhttp&password=kbocwbhttp1&to=".$mobile."&from=KBOCWB&udh=&text=".$msg."&dlr-mask=19&dlr-url";
        $url = str_replace(' ', '%20', $url);
        $res = file_get_contents($url);
        return true;
    } 

    public function VerifyOTP($mobile,$otp)
    {   
        $latestOTP = Otps::find()
        ->where(['mobile' => $mobile])
        ->select(['otp'])
        ->orderBy(['id' => SORT_DESC])
        ->one();
        return $latestOTP->otp == $otp;
    }
}
