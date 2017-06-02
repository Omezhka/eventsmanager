<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\EventMembers;
/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
    
    <?= Html::a('Зарегистрироваться на мероприятиe', 
        ['register', 'id' => $model->id_event], 
        ['class' => 'btn btn-default']) 
    ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'datetimestart_event',
            'datetimestop_event',
            'name',
            'id_owner',
        ],
    ]); ?>

<p>
    <?php if (Yii::$app->user->identity->id == $model->id_owner): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_event], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_event], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это мероприятие?',
                'method' => 'post',
            ],
        ]);
    ?>
</p>
 <?php endif; ?>
</div>

<div class = "event_members-view">
<h2>Список участников на мероприятии</h2>

<?php $provider = new ActiveDataProvider(['query' => $model->getMembers()]); ?>

<?= ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '../members/_members',
    ]); 
 ?>

</div>