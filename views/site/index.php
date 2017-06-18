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

$this->title = 'EventsManager';
?>
<div class="site-index">
<!--Мы есть, потому что нужны вам.
EventsManager - сервис, с которым легко.-->
    <div class="jumbotron">
            <h2> Надоело делать одно и то же организовывая разные мероприятия? <br> </h2>

       <h3> Неудобно регистрировать участников в разных таблицах, а потом собирать воедино?<br></h3>
        <h4> Регистрация участника непосредственно на мероприятии становится проблемой?<br> </h4>
        <h1> EventsManager поможет вам! </h1>
    </div>
    <div class="body-content">
        <div class="text-center">
            <h2>Преимущества</h2>
        <div class = "col-xs-6 col-md-4">
            Это просто
        </div>
         <div class = "col-xs-6 col-md-4">
            Это быстро
        </div>

         <div class = "col-xs-6 col-md-4">
            Печать бейджей при помощи программы
        </div>
            <?php 
                if (Yii::$app->user->isGuest) { ?>
                <p class=lead>Для начала пользования сервисом авторизуйтесь или зарегистрируйтесь</p>
                <div class="col-md-3 col-md-offset-3"> 
                    <p><a class="btn btn-lg btn-success" href="site/login">Авторизация</a></p>
                </div>

                <div class="col-md-3"> 
                    <p><a class="btn btn-lg btn-success" href="site/signup">Регистрация</a></p>
                </div>
                
            <?php } else { ?>

                <p class="lead">Создайте своё мероприятие или выберите существующее из списка</p> 
                <div class = "col-md-3 col-md-offset-3">        
                    <p><a class="btn btn-lg btn-success" href="event/create">Создать</a></p>
                </div>    
                <div class = "col-md-3">         
                    <p><a class = "btn btn-lg btn-success" href = "event/index"> Список мероприятий</a> </p>
                </div> 

            <?php } ?>
        </div>
    </div>
</div>
