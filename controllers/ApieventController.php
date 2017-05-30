<?php 
namespace app\controllers;
 
use yii\rest\ActiveController;
 
class ApieventController extends ActiveController
{
    public $modelClass = 'app\models\Event';
}