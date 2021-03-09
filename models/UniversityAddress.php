<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "university_address".
 *
 * @property int $id
 * @property string $email
 * @property string $website
 * @property string $location
 * @property string $telephone
 * @property string $contact
 * @property string $whatsapp
 * @property string $facebook_id
 * @property string $twitter_handle
 * @property int $status_act
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class UniversityAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'university_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'email', 'location', 'contact', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['id', 'status_act', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['email', 'website', 'location', 'telephone', 'contact', 'whatsapp', 'facebook_id', 'twitter_handle'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'website' => 'Website',
            'location' => 'Location',
            'telephone' => 'Telephone',
            'contact' => 'Contact',
            'whatsapp' => 'Whatsapp',
            'facebook_id' => 'Facebook ID',
            'twitter_handle' => 'Twitter Handle',
            'status_act' => 'Status Act',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getAddress0()
    {
        return $this->hasOne(UniversityAddress::className(), ['address' => 'id']);
    }
}
