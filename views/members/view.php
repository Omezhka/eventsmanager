<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Members;
/* @var $this yii\web\View */
/* @var $model app\models\Members */

$this->title = $model->firstname_rus . ' ' . $model->lastname_rus;
if (Members::userAdmin(Yii::$app->user->identity->id)){
    $this->params['breadcrumbs'][] = ['label' => 'Все пользователи', 'url' => ['index']];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Members::userAdmin(Yii::$app->user->identity->id) || $model->id == Yii::$app->user->identity->id): ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'username',
                'firstname_rus',
                'firstname_eng',
                'lastname_rus',
                'lastname_eng',
                'country',
                'city',
                'company',
                'mail',
            ],
        ]); ?>
    <?php else:?>
        <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'firstname_rus',
                    'firstname_eng',
                    'lastname_rus',
                    'lastname_eng',
                    'country',
                    'city',
                ],
            ])
        ?>
    <?php endif;?>


    <p> <?php if (Members::userAdmin(Yii::$app->user->identity->id) || $model->id == Yii::$app->user->identity->id): ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if (Members::userAdmin(Yii::$app->user->identity->id)):?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif;?>
        <?php endif;?>
    </p>

</div>
