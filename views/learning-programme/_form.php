<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use app\models\Status;
use app\models\Title;
use app\models\University;
use app\models\ProgrammeExpert;
/* @var $this yii\web\View */
/* @var $model app\models\LearningProgramme */
/* @var $form ActiveForm */
?>
<div class="card shadow">

  <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">
       
       

        <?= $form->field($model, 'prog_name') ?>
    
        <?= $form->field($model, 'university')->dropDownList(\yii\helpers\ArrayHelper::map(University::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>

        <?= $form->field($model, 'ZQF_level') ?>
    
       <?= $form->field($model, 'status')->dropDownList(\yii\helpers\ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'status'), ['prompt' => '']) ?>
            
            <?= $form->field($model, 'quarter')->dropDownList(['Quarter 1' => 'Quarter 1', 'Quarter 2' => 'Quarter 2', 'Quarter 3' => 'Quarter 3', 'Quarter 4' => 'Quarter 4'], ['prompt' => '']) ?>
            
             <?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
                'yearStart' => 0,
                'yearEnd' => -20,
                ]);
                ?>
        
    
          <?php $data = ProgrammeExpert::find()->select(['id as id', 'first_name', 'last_name', 'organisation'])->asArray()->all();
        ?>
            <?php
            $ah = \yii\helpers\ArrayHelper::map(ProgrammeExpert::find()->select(['first_name','last_name','id', 'organisation', 'title'])->all(), 'id', 
            function($data) {
                return $data['title']. ' '.$data['first_name'].' '.$data['last_name'] . ' - ' .  $data['organisation'];
            }

            );
            ?>
        
         <?= $form->field($model, 'date_of_submission')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
            
        <?= $form->field($model, 'date_of_colection')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
        ]) ?><br>
            
    
        <h3>Programme Expert</h3><br>
        
          <?= $form->field($expert, 'title')->dropDownList(\yii\helpers\ArrayHelper::map(Title::find()->asArray()->all(), 'id', 'title'), ['prompt' => '']) ?>

        <?= $form->field($expert, 'first_name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($expert, 'other_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($expert, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($expert, 'primary_email')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter the Email Address']) ?>

        <?= $form->field($expert, 'secondary_email')->textInput(['maxlength' => true, 'autocorrect' => 'off',
                        'autocapitalize' => 'none', 'autocomplete' => 'off', 'placeholder' => 'Enter the Email Address']) ?>

        <?= $form->field($expert, 'contact_no')->textInput(['maxlength' => true]) ?>

        <?= $form->field($expert, 'organisation')->textInput(['maxlength' => true]) ?>
        
        <br>
            
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- learning-programme-_form -->
