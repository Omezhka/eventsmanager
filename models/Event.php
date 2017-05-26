<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id_event
 * @property string $datestart_event
 * @property string $datestop_event
 * @property string $time_start
 * @property string $time_stop
 * @property string $what
 * @property integer $id_owner
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datestart_event', 'datestop_event', 'time_start', 'time_stop', 'what'], 'required'],
            [['datestart_event', 'datestop_event', 'time_start', 'time_stop'], 'safe'],
            [['what'], 'string', 'max' => 500],
            [['event_list'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_event' => 'ID мероприятия',
            'datestart_event' => 'Дата начала мероприятия',
            'datestop_event' => 'Дата окончания мероприятия',
            'time_start' => 'Время начала мероприятия',
            'time_stop' => 'Время окончания мероприятия',
            'what' => 'Название мероприятия',
        ];
    }

    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['id_member' => 'id_member']) // 1 id - members, 2 id - event_members
            ->viaTable('event_members', ['id_event' => 'id_event']);
           // ->all(); // 1 id - event_members, 2 id - event
    }

/*    public function behaviors()
    {
        return [
            [
                'class' => \app\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'event' => 'event_list',                   
                ],
            ],
        ];  
    }*/
}
