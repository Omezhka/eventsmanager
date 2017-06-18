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
        <hr class="small">
        <h1> EventsManager поможет вам! </h1>
    </div>
    <div class="body-content">
        <div class="text-center">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h2>Our Services</h2>
                        <hr class="small">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                                </span>
                                    <h4>
                                        <strong>Service Name</strong>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="#" class="btn btn-light">Learn More</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-compass fa-stack-1x text-primary"></i>
                                </span>
                                    <h4>
                                        <strong>Service Name</strong>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="#" class="btn btn-light">Learn More</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-flask fa-stack-1x text-primary"></i>
                                </span>
                                    <h4>
                                        <strong>Service Name</strong>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="#" class="btn btn-light">Learn More</a>
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
