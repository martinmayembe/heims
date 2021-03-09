<?php
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\ProgrammeExpert;
use app\models\University;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LearningProgrammeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Learning Programmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card shadow">

    <div class="card-header">
        <?= Html::a('Add Learning Programme', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="card-body">

<?php
    $columns = [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'university',
                'value' => function($model) {
			        return University::findOne(['id' => $model->university])->name;
			    },
            ],
            'prog_name',
            'date_of_submission',
           
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
            //'prog_expert3',
            //'prog_expert4',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    if(isset($model->status)){
			             return Status::findOne(['id' => $model->status])->status;
                    }
                    return 'null';
			    }
            ],
            'quarter',
            'year',
            'date_of_colection',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'buttons'  => [
                    'view' => function ($url, $model) {
						return Html::a('<span class="fa fa-eye"></span>', ['learning-programme/view', 'id' => $model->id],
							['title' => 'View']);
						},
					'update' => function ($url, $model) {
						return Html::a('<span class="fa fa-pencil-alt"></span>', ['learning-programme/update', 'id' => $model->id],
							['title' => 'Edit']);
						},
					'delete' => function ($url, $model) {
						return Html::a('<span class="fa fa-trash"></span>', ['learning-programme/delete', 'id' => $model->id],
							['title' => 'Delete',
							'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this Initiative?'),
							'data-method' => 'post']);
						},
                    'addExp' => function ($url, $model) {
						return Html::a('<span class="fa fa-plus"></span>', ['programme-expert/addexpert', 'id' => $model->id],
							['title' => 'Add Programme Expert']);
                    }
                    ],
					'template' => '{view} {update} {delete} {addExp}',
			],
    ];
    ?>
   
        <?= \myzero1\gdexport\helpers\Helper::createExportForm($dataProvider, $columns, $name='HEIMS - Learning Programme', $buttonOpts = ['class' => 'btn btn-info'], $url=['/gdexport/export/export','id' => 1], $writerType='Xls', $buttonLable='Export');?>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        ],
    ); ?>


</div>
