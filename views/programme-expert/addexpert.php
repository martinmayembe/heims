<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Title;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeExpert */
/* @var $form ActiveForm */
?>
<div class="programme-expert-create">
<div class="card shadow">
    
<?php $form = ActiveForm::begin(); ?>
<div class="card-body">
 <div class="row" style="float:center">
    <div class="col-md-8 col-xs-12">
      
         <?= $form->field($model, 'title')->dropDownList(\yii\helpers\ArrayHelper::map(Title::find()->asArray()->all(), 'id', 'title'), ['prompt' => '']) ?>
        
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'other_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'primary_email') ?>
        <?= $form->field($model, 'secondary_email') ?>
        <?= $form->field($model, 'contact_no') ?>
        <?= $form->field($model, 'organisation') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
     </div>
    </div>
    </div>

</div><!-- programme-expert-create -->
