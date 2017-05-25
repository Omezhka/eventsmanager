<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $username;
    public $email;
    public $password;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'required'],
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'string', 'max' => 255],
            
            ['username','trim'],
            ['username', 'htmlspecialchars'],
            ['username', 'urldecode'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            
            
            ['firstname_rus','trim'],
            ['firstname_rus', 'htmlspecialchars'],
            ['firstname_rus', 'urldecode'],
            ['firstname_rus','required'],
            ['firstname_rus', 'string', 'min' => 1, 'max' => 255],

          
            ['lastname_rus','trim'],
            ['lastname_rus', 'htmlspecialchars'],
            ['lastname_rus', 'urldecode'],
            ['lastname_rus','required'],
            ['lastname_rus', 'string', 'min' => 1, 'max' => 255],

            
            ['firstname_eng','trim'],
            ['firstname_eng', 'htmlspecialchars'],
            ['firstname_eng', 'urldecode'],
            ['firstname_eng','required'],
            ['firstname_eng', 'string', 'min' => 1, 'max' => 255],

            
            ['lastname_eng','trim'],
            ['lastname_eng', 'htmlspecialchars'],
            ['lastname_eng', 'urldecode'],
            ['lastname_eng','required'],
            ['lastname_eng', 'string', 'min' => 1, 'max' => 255],

            ['country','trim'],
            ['country', 'htmlspecialchars'],
            ['country', 'urldecode'],
            ['counry','required'],
            ['counry', 'string', 'min' => 3, 'max' => 255],

            ['city','trim'],
            ['city', 'htmlspecialchars'],
            ['city', 'urldecode'],
            ['city','required'],
            ['city', 'string', 'min' => 3, 'max' => 255],

            ['company','trim'],
            ['company', 'htmlspecialchars'],
            ['company', 'urldecode'],
            ['company','required'],
            ['company', 'string', 'min' => 1, 'max' => 255],

            ['email', 'trim'],
            ['email', 'htmlspecialchars'],
            ['email', 'urldecode'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            
            ['password', 'trim'],
            ['password', 'htmlspecialchars'],
            ['password', 'urldecode'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}