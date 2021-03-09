<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="card shadow">

    <?php $form = ActiveForm::begin(); ?>
<div class="card-body">
 <div class="row" style="float:center">
    <div class="col-md-8 col-xs-12">
        <?= $form->field($model, 'first_name') ?>
        
        <?= $form->field($model, 'last_name') ?>
        
        <?= $form->field($model, 'email') ?>
        
        <?= $form->field($model, 'contact_no') ?>
        
        <?= $form->field($model, 'role')->dropDownList(\yii\helpers\ArrayHelper::map(Role::find()->asArray()->all(), 'id', 'role'), ['prompt' => '']) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
    </div>
    </div>
</div><!-- user-_form -->
