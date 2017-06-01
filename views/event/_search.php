<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!--<?php if ($model->datetimestart_event) 
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
    ]); ?>
    
    <?php // echo $form->field($model, 'name') ?>
-->
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
