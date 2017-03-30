<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $id
 * @property integer $parent_location_id
 * @property string $location
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_location_id'], 'integer'],
            [['location'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_location_id' => 'Parent Location ID',
            'location' => 'Location',
        ];
    }
}
