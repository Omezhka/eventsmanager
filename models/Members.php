<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property integer $id_member
 * @property string $firstname_rus
 * @property string $firstname_eng
 * @property string $lastname_rus
 * @property string $lastname_eng
 * @property string $country
 * @property string $city
 * @property string $company
 * @property string $mail
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'required'],
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firstname_rus' => 'Имя (rus)',
            'firstname_eng' => 'Имя (eng)',
            'lastname_rus' => 'Фамилия (rus)',
            'lastname_eng' => 'Фамилия (eng)',
            'country' => 'Страна',
            'city' => 'Город',
            'company' => 'Компания',
            'mail' => 'E-mail',
        ];
    }
}
