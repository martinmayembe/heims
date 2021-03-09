<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "learning_programme".
 *
 * @property int $id
 * @property string $prog_name
 * @property int $university
 * @property string $date_of_submission
 * @property int $ZQF_level
 * @property int $prog_expert1
 * @property int $prog_expert2
 * @property int $prog_expert3
 * @property int $prog_expert4
 * @property string $status
 * @property string $date_of_colection
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class LearningProgramme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learning_programme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prog_name', 'university', 'quarter', 'date_of_submission', 'ZQF_level', 'prog_expert1',   'status', 'date_of_colection', 'created_by', 'created_at', 'year', 'updated_by', 'updated_at'], 'required'],
            [['id', 'university', 'status', 'ZQF_level', 'prog_expert1', 'year', 'prog_expert2', 'prog_expert3', 'prog_expert4', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['prog_name', 'quarter', 'date_of_colection'], 'string', 'max' => 255],
            [['date_of_submission'], 'string', 'max' => 30],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['university'], 'exist', 'skipOnError' => true, 'targetClass' => University::className(), 'targetAttribute' => ['university' => 'id']],
            [['prog_expert1'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeExpert::className(), 'targetAttribute' => ['prog_expert1' => 'id']],
             [['prog_expert2'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeExpert::className(), 'targetAttribute' => ['prog_expert2' => 'id']],
             [['prog_expert3'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeExpert::className(), 'targetAttribute' => ['prog_expert3' => 'id']],
             [['prog_expert4'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeExpert::className(), 'targetAttribute' => ['prog_expert4' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prog_name' => 'Programme Name',
            'university' => 'University',
            'date_of_submission' => 'Date Of Submission',
            'ZQF_level' => 'ZQF Level',
            'prog_expert1' => 'Programme Expert1',
            'prog_expert2' => 'Programme Expert2',
            'prog_expert3' => 'Programme Expert3',
            'prog_expert4' => 'Programme Expert4',
            'status' => 'Status',
            'quarter' => 'Quarter',
            'year' => 'Year',
            'date_of_colection' => 'Date Of Collection',
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
    
     public function getProgrammeExperts0()
    {
        return $this->hasMany(ProgrammeExpert::className(), ['id' => 'prog_expert1']);
    }
    
    public function getUniversity()
    {
        return $this->hasOne(University::className(), ['id' => 'university']);
    }
}
