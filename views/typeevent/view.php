<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Members;
/* @var $this yii\web\View */
/* @var $model app\models\TypeEvent */

if (Members::userAdmin(Yii::$app->user->identity->id)): 
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Тип мероприятия'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="type-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

<?php else: ?> 
У вас нет доступа к этой странице
<?php endif;?>
