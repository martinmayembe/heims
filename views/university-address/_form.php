<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card shadow">

 <div class="card-body">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],
    ]); ?>
    
 <div class="row">
    <div class="col-md-8 col-xs-12">
     <?= $form->field($address, 'email')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter the Email Address']) ?>

    <?= $form->field($address, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'contact')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter contact number']) ?>

    <?= $form->field($address, 'whatsapp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'facebook_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'twitter_handle')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
     </div>
     </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
