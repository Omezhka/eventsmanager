<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Event;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_event',
    ]) 
    ?>

</div>
