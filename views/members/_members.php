<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use app\models\Members;
use app\models\Event;
?>
<div class="post">
    <p><?php 
    echo Html::a(Html::encode($model->firstname_rus . ' ' . $model->lastname_rus), 
    Url::to(['../members/view', 'id' => $model->id]));        
    ?>
<?php 
$event = new Event();
      if (Members::userAdmin(Yii::$app->user->identity->id) || 
          (Yii::$app->user->identity->id === $model->id) ||
          Yii::$app->user->identity->id === $ownerId):  ?>  
    <?php 
    echo Html::a('Удалить', 
    Url::to(['../event/remove','id' => $eventId, 'user_id' => $model->id]),
    ['class' => 'btn btn-danger']); 
        ?>
    </p> 
    <?php endif;?>
</div>