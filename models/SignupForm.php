<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
use app\models\User;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $username;
    public $email;
    public $password;
    public $firstname_rus;
    public $firstname_eng;
    public $lastname_rus;
    public $lastname_eng;
    public $country;
    public $city;
    public $company;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['username','trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['firstname_rus','trim'],
            ['firstname_rus','required'],
            ['firstname_rus', 'string', 'min' => 1, 'max' => 255],

          
            ['lastname_rus','trim'],
            ['lastname_rus','required'],
            ['lastname_rus', 'string', 'min' => 1, 'max' => 255],

            
            ['firstname_eng','trim'],
            ['firstname_eng','required'],
            ['firstname_eng', 'string', 'min' => 1, 'max' => 255],

            
            ['lastname_eng','trim'],
            ['lastname_eng','required'],
            ['lastname_eng', 'string', 'min' => 1, 'max' => 255],

            ['country','trim'],
            ['country','required'],
            ['country', 'string', 'min' => 3, 'max' => 255],

            ['city','trim'],
            ['city','required'],
            ['city', 'string', 'min' => 3, 'max' => 255],

            ['company','trim'],
            ['company','required'],
            ['company', 'string', 'min' => 1, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
        ];
    }

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
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user -> username = $this -> username;
        $user -> firstname_rus = $this -> firstname_rus;
        $user -> lastname_rus = $this -> lastname_rus;
        $user -> firstname_eng = $this -> firstname_eng;
        $user -> lastname_eng = $this -> lastname_eng;
        $user -> country = $this -> country;
        $user -> city = $this -> city;
        $user -> company = $this -> company;
        $user -> email = $this -> email;
        $user -> setPassword($this -> password);
        $user -> generateAuthKey();
        return $user -> save() ? $user : null;
    }
 
}