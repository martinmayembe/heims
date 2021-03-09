<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Title */

$this->title = 'Update Title: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="title-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
