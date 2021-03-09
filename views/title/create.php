<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Title */

$this->title = 'Create Title';
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
