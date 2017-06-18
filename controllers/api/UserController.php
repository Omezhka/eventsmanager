<?php 
namespace app\controllers\api;

use Yii; 
use yii\rest\ActiveController;
use app\models\User;
 
class UserController extends ActiveController
{
    public $modelClass = 'app\models\Members';

    public function actionLoginuser()
    {
        $request = Yii::$app->request;  

        $user = User::findByUsername($request->post('username'));
        
       if ($user and $user->validatePassword($request->post('password'))) {
            echo '{"auth_key": "'.$user->auth_key.'"}';
       } else {
            echo '{"auth_key": "error"}';
       }
    }
}



