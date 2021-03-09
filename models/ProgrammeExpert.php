<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "programme_expert".
 *
 * @property int $id
 * @property string $title
 * @property string $first_name
 * @property string $other_name
 * @property string $last_name
 * @property string $primary_email
 * @property string $secondary_email
 * @property string $contact_no
 * @property string $organisation
 * @property int $status_act
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class ProgrammeExpert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programme_expert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'first_name', 'last_name', 'primary_email', 'contact_no', 'organisation', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['id', 'title', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['title', 'first_name', 'other_name', 'last_name', 'primary_email', 'secondary_email', 'contact_no', 'organisation'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'first_name' => 'First Name',
            'other_name' => 'Other Name',
            'last_name' => 'Last Name',
            'primary_email' => 'Primary Email',
            'secondary_email' => 'Secondary Email',
            'contact_no' => 'Contact No',
            'organisation' => 'Organisation',
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
    
    public function getFullName()
    {
        return Title::findOne(['id' => $this->title])->title.' '.ucwords($this->first_name)." ".ucwords($this->other_name)." ".ucwords($this->last_name);
    }
}
