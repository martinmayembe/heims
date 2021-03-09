<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\University */

$this->title = 'Add University';
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
?>
<div class="university-create">

    <?= $this->render('_form', [
        'model' => $model,
        'address' => $address,
    ]) ?>

</div>
