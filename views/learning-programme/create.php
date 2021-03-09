<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LearningProgramme */

$this->title = 'Create Learning Programme';
$this->params['breadcrumbs'][] = ['label' => 'Learning Programmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learning-programme-create">

    <?= $this->render('_form', [
        'model' => $model,
        'expert' => $expert,
    ]) ?>

</div>
