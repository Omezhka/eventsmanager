<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;
use yii\widgets\ListView;
use yii\controllers\SiteControllers;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
            <h1>Что-то мотивирующее пользоваться нашим сервисом!</h1>
        
    </div>

    <div class="body-content">

        <div class = "col-lg-12">
                <?php 
                
            if (Yii::$app->user->isGuest) { ?>
            
                    <p class=lead>Для начала авторизуйтесь</p>
                    <p><a class="btn btn-lg btn-success" href="site/login">Авторизация</a></p>
                
        </div>
            
            <?php } else { ?>

        <div class = "col-lg-6">
            
            <p class="lead">Создайте своё мероприятие!</p> 
            <p><a class="btn btn-lg btn-success" href="event/create">Создать</a></p>
    
        </div>
            
        <div class = "col-lg-6">
            <p class = "lead"> Или выберите мероприятие из </p> 
            
            <p><a class = "btn btn-lg btn-success" href = "event/index"> существующих</a> </p>
        
            <?php } ?>
        
        </div>
    </div>
</div>
