<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeExpert */

$this->title = $model->title .' ' . $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Programme Experts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card shadow">

    <div class="card-header">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
<div class="card-body">
 <div class="row" style="float:center">
    <div class="col-md-8 col-xs-12">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'first_name',
            'other_name',
            'last_name',
            'primary_email:email',
            'secondary_email:email',
            'contact_no',
            'organisation',
            //'status_act',
            //'created_by',
            'created_at:DateTime',
            //'updated_by',
            'updated_at:DateTime',
        ],
    ]) ?>

</div>
