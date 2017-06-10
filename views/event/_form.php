<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\models\TypeEvent;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>    

        <?= $form->field($model, 'id_type_event')
            ->dropDownList(ArrayHelper::map(
                TypeEvent::find()->andWhere('id>0')->all(), 'id', 'name'
            )) ?>

        <?php
            echo Collapse::widget([
                'items' => [
                    [
                        'label' => 'Cправка о типах мероприятий ',
                        'content' => 'S (до 50 человек) - 3 000руб.'
                        .'<br>'.
                        'M (до 250 человек) - 6 000руб.',
                        // Открыто по-умолчанию
                        'contentOptions' => []
                    ], 
                ]
                ]);
        ?>

        <?php 
            if ($model->datetimestart_event) 
            {
                $model->datetimestart_event = date($model->datetimestart_event);
            }    
            echo $form->field($model, 'datetimestart_event')->widget(DateTimePicker::className(),
            [
            'type' => DateTimePicker::TYPE_INPUT,
            'value'=> date("yyyy-mm-dd hh:ii:ss"),
                'pluginOptions' => 
                [
                    'format' => 'yyyy-mm-dd hh:ii:ss',
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
                $model->datetimestop_event = date($model->datetimestop_event);
            }  
            echo $form->field($model, 'datetimestop_event')->widget(DateTimePicker::className(),
            [
            'type' => DateTimePicker::TYPE_INPUT,
            'value'=> date($model->datetimestop_event),
                'pluginOptions' => 
                [
                // 2017-05-07 12:00:00
                    'convertFormat'=>true,
                    'format'=>'yyyy-mm-dd hh:ii:ss',
                    'autoclose'=>true,
                    'weekStart'=>1, //неделя начинается с понедельника
                    'startDate' => '01.05.2017 00:00', //самая ранняя возможная дата
                    'todayBtn'=>true, //снизу кнопка "сегодня"
                ]
            ]);
        ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>
</div>
