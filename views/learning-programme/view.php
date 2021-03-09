<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ProgrammeExpert;
use app\models\University;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\LearningProgramme */

$this->title = $model->prog_name;
$this->params['breadcrumbs'][] = ['label' => 'Learning Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="learning-programme-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add Programme Expert', ['programme-expert/addexpert', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prog_name',
             [
                'attribute' => 'university',
                'value' => function($model) {
			        return University::findOne(['id' => $model->university])->name;
			    },
            ],
            'date_of_submission:Date',
            
            'ZQF_level',
            [
                'attribute' => 'prog_expert1',
                'value' => function($model) {
			        return ProgrammeExpert::findOne(['id' => $model->prog_expert1])->fullName;
			    }
            ],
            [
                'attribute' => 'prog_expert2',
                'value' => function($model) {
                    if(isset($model->prog_expert2)){
			             return ProgrammeExpert::findOne(['id' => $model->prog_expert2])->fullName;
                    }
                   return 'null'; 
			    }
            ],
            [
                'attribute' => 'prog_expert3',
               'value' => function($model) {
                    if(isset($model->prog_expert3)){
			             return ProgrammeExpert::findOne(['id' => $model->prog_expert3])->fullName;
                    }
                   return 'null'; 
			    }
            ],
            [
                'attribute' => 'prog_expert4',
                'value' => function($model) {
                    if(isset($model->prog_expert4)){
			             return ProgrammeExpert::findOne(['id' => $model->prog_expert4])->fullName;
                    }
                   return 'null'; 
			    }
            ],
            [
                'attribute' => 'status',
                'value' => function($model) {
			        return Status::findOne(['id' => $model->university])->status;
			    },
            ],
            'quarter',
            'year',
            'date_of_colection:Date',
        ],
    ]) ?>

</div>
