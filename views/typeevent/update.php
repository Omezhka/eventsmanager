<?php

use yii\helpers\Html;
use app\models\Members;
/* @var $this yii\web\View */
/* @var $model app\models\TypeEvent */

if (Members::userAdmin(Yii::$app->user->identity->id)): 
$this->title = Yii::t('app', 'Редактировать {modelClass}: ', [
    'modelClass' => 'тип мероприятия',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типы мероприятий'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="type-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


<?php else: ?> 
У вас нет доступа к этой странице
<?php endif;?>
