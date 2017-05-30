<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id_event
 * @property string $datetimestart_event
 * @property string $datetimestop_event
 * @property string $name
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
            [['datetimestart_event', 'datetimestop_event', 'name'], 'required'],
            [['datetimestart_event', 'datetimestop_event'], 'safe'],
            [['name'], 'string', 'max' => 500],
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
            'datetimestart_event' => 'Дата и время начала мероприятия',
            'datetimestop_event' => 'Дата и время окончания мероприятия',
            'name' => 'Название мероприятия',
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
