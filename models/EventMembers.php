<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_members".
 *
 * @property integer $id
 * @property integer $id_event
 * @property integer $id
 * @property integer $id_type
 * @property integer $payment
 */
class EventMembers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        // 'id_type'
        //'payment'
        return [
            [['id_event', 'id_member'], 'required'],
            [['id_event', 'id_member'], 'integer'],
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
            // 'name' => 'Название мероприятия',
            // 'payment' => 'Оплата',
        ];
    }
}
