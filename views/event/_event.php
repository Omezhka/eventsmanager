<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class="post">
    <p>
    <?= Html::a(Html::encode($model->name), Url::to(['view', 'id' => $model->id])); ?>
    </p> 
</div>