<?php

use yii\helpers\Html;
use app\models\Members;

/* @var $this yii\web\View */
/* @var $model app\models\TypeEvent */

if (Members::userAdmin(Yii::$app->user->identity->id)):
$this->title = Yii::t('app', 'Добавление типа мероприятия');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Тип мероприятия'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php else: ?> 
У вас нет доступа к этой странице
<?php endif;?>