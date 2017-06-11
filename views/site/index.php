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

    <div class="jumbotron">
            <h1>Мы есть, потому что нужны вам.</h1>
    </div>
    <br>
    <br>
    <div class="body-content">

        <div class="text-center">
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
