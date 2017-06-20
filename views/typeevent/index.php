<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Members;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ('Типы мероприятий');

if (Members::userAdmin(Yii::$app->user->identity->id)):
?>
<div class="type-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php else: ?>
У Вас нет доступа к этой странице. 
<?php endif; ?>
