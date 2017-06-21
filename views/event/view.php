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
    <?php else: ?>
    <div class="alert alert-success"> Вы зарегистрированы на это мероприятиe.</div>
<?php endif;?>
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
   <p> Для установки Desktop приложения перейдите по ссылке 
   <a href="http://dropmefiles.com/EaLqi"> EventsManager.Badges </a> </p> 
</p>
 <?php endif; ?>
</div>

<div class = "event_members-view">
<h2>Список участников на мероприятии</h2>

<?php $provider = new ActiveDataProvider(
    [
        'query' => $model->getMembers(), 
       
    ]); ?>

<?= ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '../members/_members',
        'viewParams' => [
            'eventId' => $model->id,
            'ownerId' => $model->id_owner,
        ]
    ]); 
 ?>

</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45063461 = new Ya.Metrika({
                    id:45063461,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45063461" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->