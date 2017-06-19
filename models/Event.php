<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
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
            [['datetimestart_event', 'datetimestop_event'], 'datetime'],
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
            'id_type_event' => 'Тип',
            'id' => 'ID мероприятия',
            'datetimestart_event' => 'Дата и время начала',
            'datetimestop_event' => 'Дата и время окончания',
            'name' => 'Название',
            'owner.username' => 'Создатель',
            'type.name' => 'Размер'
        ];
    }

    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['id' => 'id_member']) // 1 id - members, 2 id - event_members
            ->viaTable('event_members', ['id_event' => 'id']);
            // 1 id - event_members, 2 id - event
    }

    public function getOwner()
    {
        return $this->hasOne(Members::className(),['id' => 'id_owner']);
    }

    public function getType()
    {
        return $this->hasOne(TypeEvent::className(), ['id' => 'id_type_event']); // 1 id - type_event, 2 id - event
    }

    public function isPaymentEvent($id)
    {
        $model = new Event();
        $pay = Event::find()
        ->where(['id'=>$id])
        ->one();
        if ($model->payment == 1) {
            return true;
        } else {
            return false;
        }
    }

    
}
