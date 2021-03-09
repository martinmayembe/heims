<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'other_name',
            'last_name',
            'email',
            //'password',
            //'auth',
            //'contact_no',
            //'role',
            //'created_by',
            //'created_at',
            //'updated_by',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'buttons'  => [
                    'view' => function ($url, $model) {
						return Html::a('<span class="fa fa-eye"></span>', ['luser/view', 'id' => $model->id],
							['title' => 'View']);
						},
					'update' => function ($url, $model) {
						return Html::a('<span class="fa fa-pencil-alt"></span>', ['user/update', 'id' => $model->id],
							['title' => 'Edit']);
						},
					'delete' => function ($url, $model) {
						return Html::a('<span class="fa fa-trash"></span>', ['user/delete', 'id' => $model->id],
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
