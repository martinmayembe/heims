<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Title;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgrammeExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programme Experts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programme-expert-index">

    <?php 
        $columns = [
        ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'value' => function($model) {
			        return Title::findOne(['id' => $model->title])->title;
			    },
            ],
            'first_name',
            'other_name',
            'last_name',
            'primary_email:email',
            //'secondary_email:email',
            'contact_no',
            'organisation',
            //'status_act',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'buttons'  => [
                    'view' => function ($url, $model) {
						return Html::a('<span class="fa fa-eye"></span>', ['programme-expert/view', 'id' => $model->id],
							['title' => 'View']);
						},
					'update' => function ($url, $model) {
						return Html::a('<span class="fa fa-pencil-alt"></span>', ['programme-expert/update', 'id' => $model->id],
							['title' => 'Edit']);
						},
					'delete' => function ($url, $model) {
						return Html::a('<span class="fa fa-trash"></span>', ['programme-expert/delete', 'id' => $model->id],
							['title' => 'Delete',
							'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this Initiative?'),
							'data-method' => 'post']);
						},
					'template' => '{view} {update} {delete}',
				],
            ],
        ];
    ?>

    <?= \myzero1\gdexport\helpers\Helper::createExportForm($dataProvider, $columns, $name='HEIMS - Programme Experts', $buttonOpts = ['class' => 'btn btn-info'], $url=['/gdexport/export/export','id' => 1], $writerType='Xls', $buttonLable='Export');?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
            
    ]); ?>


</div>
