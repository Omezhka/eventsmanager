<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

 class EventMembers extends Controller 
 {
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDelete($id_event, $id)
    {
        $this->findModel($id_event, $id)->delete();

        return $this->redirect(['index']);
    }
 }
?>