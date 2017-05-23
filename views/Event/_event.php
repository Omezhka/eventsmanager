<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <p><?= Html::a(Html::encode($model->what), ['view', 'id' => $model->id_event]); ?></p> 
</div>