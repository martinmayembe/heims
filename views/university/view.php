<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UniversityAddress;

/* @var $this yii\web\View */
/* @var $model app\models\University */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="university-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
             [
                'attribute' => 'address',
                'value' => function($model) {
			        return UniversityAddress::findOne(['id' => $model->address])->location;
			    }
            ],
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $address,
        'attributes' => [

            'email',
            'telephone',
            'contact',
            'website',
            'whatsapp',
            'facebook_id',
            'twitter_handle'
        ],
    ]) ?>

</div>
