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
                <p class="lead">Для начала пользования сервисом зарегистрируйтесь или авторизуйтесь</p> 
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
            
            <div class="btn-group btn-group-justified">
                  <div class="btn-group">
                    <p><a class="btn btn-lg btn-success" href="members/index">Участники</a></p>
                </div>    
                <div class="btn-group">       
                    <p><a class="btn btn-lg btn-success" href="event/index">Мероприятия</a></p>
                </div>
                <div class="btn-group">     
                    <p><a class="btn btn-lg btn-success" href="typeevent/index">Типы мероприятий</a></p>
                </div>
            </div>
                
            <?php } ?>

            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-10 col-lg-offset-1">
                        <hr class="small">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                   <span class="glyphicon glyphicon-ok"></span>                                  
                                    <p>Простой интерфейс и только необходимые функции не заставят блуждать в поисках нужной страницы </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="glyphicon glyphicon-print"></span>
                                    <p>С помощью Desktop приложения можно печатать бейджи сразу после установки и авторизации </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="service-item">
                                    <span class="glyphicon glyphicon-flash"></span>
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

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45063461 = new Ya.Metrika({
                    id:45063461,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45063461" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
