<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\SignupForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните все поля для регистрации:</p>
    <div class="row">
        <div class="col-lg-5">
 
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'firstname_rus')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'firstname_eng')->textInput() ?>
                <?= $form->field($model, 'lastname_rus')->textInput() ?>
                <?= $form->field($model, 'lastname_eng')->textInput() ?>
                <?= $form->field($model, 'country')->textInput() ?>
                <?= $form->field($model, 'city')->textInput() ?>
                <?= $form->field($model, 'company')->textInput() ?>
                <?= $form->field($model, 'mail')->textInput() ?>
                <?= $form->field($model, 'username')->textInput() ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <p>При нажатии на кнопку "Регистрация" Вы соглашаетесь на обработку персональных данных. 
                    <a href="http://www.consultant.ru/document/cons_doc_LAW_61801/">Федеральный закон "О персональных данных" от 27.07.2006 N 152-ФЗ (последняя редакция)</a>
                </p>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>