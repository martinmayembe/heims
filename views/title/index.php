<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TitleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-index">


    <p>
        <?= Html::a('Create Title', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',

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
                   
					'template' => '{view} {update} {delete}',
			],
        ],
        ],
    ]); ?>


</div>
