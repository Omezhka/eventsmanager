<?php 
namespace app\controllers;

use Yii; 
use yii\rest\ActiveController;
use app\models\User;
 
class ApiuserController extends ActiveController
{
    public $modelClass = 'app\models\Members';

    public function actionLoginuser()
    {
        $request = Yii::$app->request;  

        $user = User::findByUsername($request->post('username'));
        
        if ($user and $user->validatePassword($request->post('password'))) {
            echo '[{'.$user->auth_key.'}]';
        } else {
            echo '[{Incorrect login or password.}]';
        }

    }

}

