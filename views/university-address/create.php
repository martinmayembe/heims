<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityAddress */

$this->title = 'Create University Address';
$this->params['breadcrumbs'][] = ['label' => 'University Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
