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
    <div class="body-content">
        <div class="text-center">
        <div class = "container">
        <h1>  EventsManager - это сервис регистрации и управления мероприятиями.</h1>
        <?php
            if (Yii::$app->user->isGuest) { ?>
                <p class="lead">Для начала пользоваия сервисом зарегистрируйтесь или авторизуйтесь</p> 
                <div class = "col-md-3 col-md-offset-3">        
                    <p><a class="btn btn-lg btn-success" href="site/login">Авторизация</a></p>
                </div>    
                <div class = "col-md-3">         
                    <p><a class = "btn btn-lg btn-success" href = "site/signup">Регистрация</a> </p>
                </div> 

            <?php } elseif (!Members::userAdmin(Yii::$app->user->identity->id)) { ?>

                <p class="lead">Создайте своё мероприятие или выберите существующее из списка</p> 
                <div class = "col-md-3 col-md-offset-3">        
                    <p><a class="btn btn-lg btn-success" href="event/create">Создать</a></p>
                </div>    
                <div class = "col-md-3">         
                    <p><a class = "btn btn-lg btn-success" href = "event/index"> Список мероприятий</a> </p>
                </div> 

            <?php } else { ?>
            
                <div class = "col-md-3 col-md-offset-3">       
                    <p><a class="btn btn-lg btn-success" href="members/index">Участники</a></p>
                </div>    
                <div class = "col-md-3 col-md-offset-3">       
                    <p><a class="btn btn-lg btn-success" href="event/index">Мероприятия</a></p>
                </div>
                
            <?php } ?>

            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-10 col-lg-offset-1">
                        <hr class="small">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                   
                                </span>
                                    <h4>
                                        <strong>Просто</strong>
                                    </h4>
                                   
                                    <p>Интуитивно понятный интерфейс и только необходимые функции не заставят блуждать в поисках нужной страницы </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="glyphicon glyphicon-thumbs-up">
                                </span>
                                    <h4>
                                        <strong>Удобно</strong>
                                    </h4>
                                    <p>С помощью Desktop программы можно печатать бейджи сразу после установки и авторизации </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-flask fa-stack-1x text-primary"></i>
                                </span>
                                    <h4>
                                        <strong>Быстро</strong>
                                    </h4>
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                    <p>Зарегистрироваться и создать мероприятие либо присоединиться к существующему за пару кликов</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.col-lg-10 -->
                </div>
                <!-- /.row -->
            </div>
        <!-- /.container -->
        </div>
        </div>
    </div>
</div>
