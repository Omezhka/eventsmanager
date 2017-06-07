<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "members".
 *
 * @property integer $id
 * @property string $username
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
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'required'],
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'string', 'max' => 255],
            [['username', 'mail'], 'trim'],
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

    public function fields()
    {
        $fields = parent::fields();

        // удаляем небезопасные поля
        unset(
            $fields['auth_key'],
            $fields['password_hash'],
            $fields['password_reset_token'],
            $fields['status'],
            $fields['created_at'],
            $fields['updated_at']
            );

        return $fields;
    }

}
