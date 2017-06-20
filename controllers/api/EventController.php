<?php 
namespace app\controllers\api;

use Yii; 
use yii\rest\ActiveController;
use app\models\Event;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\models\EventMembers;
 
class EventController extends ActiveController
{
    public $modelClass = 'app\models\Event';

    public function actionMembers($id) {
        $event = $this->findModel($id);
        $provider = new ActiveDataProvider(['query' => $event->getMembers()]);
        return $provider;
    }
//events.local/apievent/my?auth_key=xLht89u-lzRr234TDqIMOxwKJhHubY59
    public function behaviors()
    {   
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = QueryParamAuth::className();
        $behaviors['authenticator']['tokenParam'] = 'auth_key';

        $behaviors['access']['class'] = AccessControl::className();
        $behaviors['access']['only'] = [ 'my, remove'];
        $behaviors['access']['rules'] = [
            [
                'allow' => true,
                'actions' => [ 'my, remove'],
                'roles' => ['@'],
            ]
        ];
         return $behaviors;
    }

    public function actionMy()
    {
        $events = Event::find()->where(['id_owner' => Yii::$app->user->identity->id]);
        $dataProvider = new ActiveDataProvider(['query' => $events]);

        return $dataProvider;
    }

    public function actionRemove($id)
    {
       
        $request = Yii::$app->request;  
        $user_id = $request->get('user_id');
        $evmem = EventMembers::find()
        ->where(['id_member' => $user_id, 'id_event' => $id])
        ->one();
        
        if ($evmem->delete()) {
            echo '{"OK"}';
       } else {
            echo '{"error"}';
       }
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}