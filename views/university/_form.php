<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\University */
/* @var $form ActiveForm */
?>
<div class="university-_form">
<div class="card shadow" >
<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
 <div class="row" style="float:center">
    <div class="col-md-8 col-xs-12">

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'type')->dropDownList(['Private' => 'Private', 'Public' => 'Public'], ['prompt'=>'Type of University']) ?>
         <?= $form->field($address, 'location') ?>
        <?= $form->field($address, 'website') ?>
        <?= $form->field($address, 'email') ?>
        <?= $form->field($address, 'telephone') ?>
        <?= $form->field($address, 'contact') ?>
        <?= $form->field($address, 'whatsapp') ?>
        <?= $form->field($address, 'facebook_id') ?>
        <?= $form->field($address, 'twitter_handle') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
     </div>
    </div>
    </div>

</div><!-- university-_form -->
