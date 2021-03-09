<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LearningProgrammeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learning-programme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prog_name') ?>

    <?= $form->field($model, 'university') ?>

    <?= $form->field($model, 'date_of_submission') ?>

    <?= $form->field($model, 'ZQF_level') ?>

    <?php // echo $form->field($model, 'prog_expert1') ?>

    <?php // echo $form->field($model, 'prog_expert2') ?>

    <?php // echo $form->field($model, 'prog_expert3') ?>

    <?php // echo $form->field($model, 'prog_expert4') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_of_colection') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
