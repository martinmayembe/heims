<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Title;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammeExpert */
/* @var $form yii\widgets\ActiveForm */
?>
<?php Pjax::begin(['linkSelector' => '#testpjax', 'enablePushState' => true]) ?>

<div class="card shadow">

     <?php $form = ActiveForm::begin(); ?>
<div class="card-body">
 <div class="row" style="float:center">
    <div class="col-md-8 col-xs-12">

   
    <?= $form->field($model, 'title')->dropDownList(\yii\helpers\ArrayHelper::map(Title::find()->asArray()->all(), 'id', 'title'), ['prompt' => '']) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_email')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter the Email Address']) ?>

    <?= $form->field($model, 'secondary_email')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter the Email Address']) ?>

    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>

        
    <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    

</div>
