<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Members;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*if (Members::userAdmin(Yii::$app->user->identity->id)):*/
$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 
if (Members::userAdmin(Yii::$app->user->identity->id)): ?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Members', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname_rus',
            'firstname_eng',
            'lastname_rus',
            'lastname_eng',
             'country',
             'city',
             'company',
             'mail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php else: ?>
У Вас нет доступа к этой странице. 
<?php endif; ?>
