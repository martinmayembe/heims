<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\UniversityAddress;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Universities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card shadow">

    <div class="card-header">
        <?= Html::a('Add University', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="card-body">
        <h4><?= Html::encode($this->title) ?></h4>
        <?php //Pjax::begin(); ?>
        <?php 
            $columns = [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            'name',
            [
                'attribute' => 'address',
                'value' => function($model) {
			        return UniversityAddress::findOne(['id' => $model->address])->location;
			    }
            ],
			 [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'buttons'  => [
                    'view' => function ($url, $model) {
						return Html::a('<span class="fa fa-eye"></span>', ['university/view', 'id' => $model->id],
							['title' => 'View University']);
						},
					'update' => function ($url, $model) {
						return Html::a('<span class="fa fa-pencil-alt"></span>', ['university/update', 'id' => $model->id],
							['title' => 'Edit']);
						},
					'delete' => function ($url, $model) {
						return Html::a('<span class="fa fa-trash"></span>', ['university/delete', 'id' => $model->id],
							['title' => 'Delete',
							'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this Initiative?'),
							'data-method' => 'post']);
						},
                    
                    'programme' => function ($url, $model){ 
                        return Html::a('<span class="fas fa-clipboard"></span>', Url::to(['learning-programme/indexbyuni', 'id' =>  $model->id]), [
                        'title' => 'View Programmes Offered',
                        'data-method' => 'post',
                    ]);
                    }
                    ],
                 
					'template' => '{view} {update} {delete} {programme}',
				],
			];
        ?>
   
        <?= \myzero1\gdexport\helpers\Helper::createExportForm($dataProvider, $columns, $name='HEIMS - Universities', $buttonOpts = ['class' => 'btn btn-info'], $url=['/gdexport/export/export','id' => 1], $writerType='Xls', $buttonLable='Export');?>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        ],
    ); ?>


</div>
