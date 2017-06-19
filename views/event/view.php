<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\EventMembers;
use app\models\User;
use app\models\Event;
use app\models\Members;
use yii\helpers\Url;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
    
    <?php if (!User::userInEvent($model->id, Yii::$app->user->identity->id) /*&& (!Yii::$app->user->identity->id === $model->id_owner)*/):?>
    <?= Html::a(Html::encode('Зарегистрироваться на мероприятиe'), 
        ['register', 'id' => $model->id], 
        ['class' => 'btn btn-default']) ?>
    <?php endif ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'datetimestart_event',
            'datetimestop_event',
               'owner.username' => [
               'attribute' => 'owner.username',
               'format' => 'raw',
               'value' => Html::a(Html::encode($model->owner->username),
                   Url::to('/members/view?id='.$model->id_owner)
            )
           ],
            'type.name'
        ],
    ]); ?>
<p>
    <?php if (Members::userAdmin(Yii::$app->user->identity->id) || Yii::$app->user->identity->id === $model->id_owner): ?>
        <?= Html::a(Html::encode('Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Html::encode('Удалить'), ['delete', 'id' => $model->id], [
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

<?php $provider = new ActiveDataProvider(
    [
        'query' => $model->getMembers(), 
        'pagination' => [
            'pageSize' => 12
        ],
    ]); ?>

<?= ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '../members/_members',
    ]); 
 ?>

</div>