<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\UniversityAddress;

/**
 * This is the model class for table "university".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $address
 * @property int $status_act
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class University extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'address', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['id', 'address', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['name',  'type'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => UniversityAddress::className(), 'targetAttribute' => ['address' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'address' => 'Address',
            'status_act' => 'Status Act',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
     public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    
    public function getAddress()
    {
        return $this->hasOne(UniversityAddress::className(), ['address' => 'id']);
    }

}
