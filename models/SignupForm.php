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
    public $phone;
    public $password;
    public $email;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'password' => 'Пароль'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с таким именем уже существует'],
            [['email'], 'email'],
            [['email'], 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с таким email уже существует'],
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'integer'],
//            ['phone', 'string', 'min' => 2, 'max' => 255],
            ['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Аккаунт с таким телефоном уже существует'],
            ['password', 'required'],
            ['password', 'string', 'min' => 4],
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
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        //$user->generateAccessToken();
        return $user->save() ? $user : null;
    }

}