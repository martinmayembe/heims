<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],
    ]); ?>
    <div class="form-group field-loginform-email">
        <?= $form->field($model, 'email')->textInput(['autocorrect' => 'off', 'autocapitalize' => 'none',
            'autocomplete' => 'off', 'autofocus' => false]) ?>
    </div>
    <div class="form-group field-loginform-password">
        <?= $form->field($model, 'password')->passwordInput() ?>
    </div>
        <br/>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
<?php //var_dump(session_save_path()); ?>
