<?php 
namespace app\controllers;
 
use yii\rest\ActiveController;
use app\models\Event;
use yii\data\ActiveDataProvider;
 
class ApieventController extends ActiveController
{
    public $modelClass = 'app\models\Event';

    public function actionMembers($id) {
        $event = $this->findModel($id);
        $provider = new ActiveDataProvider(['query' => $event->getMembers()]);
        return $provider;
    }

    /*public function behaviors()
    {
        return [

        ]
    }
*/
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