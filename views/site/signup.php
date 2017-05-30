<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\SignupForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-5">
 
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'firstname_rus')->textInput() ?>
                <?= $form->field($model, 'firstname_eng')->textInput() ?>
                <?= $form->field($model, 'lastname_rus')->textInput() ?>
                <?= $form->field($model, 'lastname_eng')->textInput() ?>
                <?= $form->field($model, 'country')->textInput() ?>
                <?= $form->field($model, 'city')->textInput() ?>
                <?= $form->field($model, 'company')->textInput() ?>
                <?= $form->field($model, 'mail')->textInput() ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>