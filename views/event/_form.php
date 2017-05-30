<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

<?php 
if ($model->datetimestart_event) 
{
    $model->datetimestart_event = date("yyyy-mm-dd hh:ii", $model->datetimestart_event);
}    
    echo $form->field($model, 'datetimestart_event')->widget(DateTimePicker::className(),
    [
    'type' => DateTimePicker::TYPE_INPUT,
    'value'=> date("yyyy-mm-dd hh:ii", $model->datetimestart_event),
        'pluginOptions' => 
        [
            'format' => 'yyyy-mm-dd hh:ii',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]);
?>

<?php 
if ($model->datetimestop_event) 
{
    $model->datetimestop_event = date("yyyy-mm-dd hh:ii", $model->datetimestop_event);
}    
    echo $form->field($model, 'datetimestop_event')->widget(DateTimePicker::className(),
    [
    'type' => DateTimePicker::TYPE_INPUT,
    'value'=> date("yyyy-mm-dd hh:ii", $model->datetimestop_event),
        'pluginOptions' => 
        [
           // 2017-05-07 12:00:00
            'convertFormat' => true,
            'format' => 'yyyy-mm-dd hh:ii',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2017 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]);
?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
