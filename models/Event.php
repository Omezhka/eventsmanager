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
            [['datetimestart_event', 'datetimestop_event', 'name','id_type_event'], 'required'],
            [['datetimestart_event', 'datetimestop_event','id_type_event', 'name'], 'safe'],
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
            'members.username' => 'Создатель мероприятия' 
        ];
    }

    public function getMembers()
    {
        return $this->hasOne(Members::className(), ['id' => 'id_member']) // 1 id - members, 2 id - event_members
            ->viaTable('event_members', ['id_event' => 'id_event']);
            // 1 id - event_members, 2 id - event
    }

    public function getType()
    {
        return $this->hasOne(TypeEvent::className(), ['id' => 'id_type_event']) // 1 id - type_event, 2 id - event
            ->viaTable('type_event', ['id_type_event' => 'id']); // 1 id - event, 2 id - type_event
    }

}
