<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Members */

$this->title = $model->firstname_rus . ' ' . $model->lastname_rus;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_member, 'url' => ['view', 'id' => $model->id_member]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
