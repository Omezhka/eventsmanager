<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class="post">
    <p><?php 
    echo Html::a(Html::encode($model->firstname_rus . ' ' . $model->lastname_rus), 
    Url::to(['../members/view', 'id' => $model->id])); 
        ?>
    </p> 
</div>