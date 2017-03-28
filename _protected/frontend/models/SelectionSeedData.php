<?php

namespace frontend\models;

use Yii;

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
 */
class SelectionSeedData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'selection_seed_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['entity_type', 'updated_by'], 'string', 'max' => 45],
            [['entity_value'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_type' => 'Entity Type',
            'entity_id' => 'Entity ID',
            'entity_value' => 'Entity Value',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'updated_by' => 'Updated By',
        ];
    }
}
