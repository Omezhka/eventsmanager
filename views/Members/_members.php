<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <p><?= Html::a(Html::encode($model->firstname_rus . ' ' . $model->lastname_rus ), ['../members/view', 'id' => $model->id]); ?></p> 
</div>