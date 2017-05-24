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

    public function actionDelete($id_event, $id_member)
    {
        $this->findModel($id_event, $id_member)->delete();

        return $this->redirect(['index']);
    }
 }
?>