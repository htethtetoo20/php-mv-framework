<?php


namespace app\models;
use htethtetoo\phpmvc\Application;

use htethtetoo\phpmvc\Model;

class LoginForm extends Model
{

    public string $email='';
    public string $password='';

    public function rules(): array
    {
        return [
            'email'=>[parent::RULE_REQUIRED,parent::RULE_EMAIL],
            'password'=>[parent::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user=User::findOne(['email'=>$this->email]);

        if(!$user){
            $this->addError('email','User does not exist with this email address');
            return false;
        }
        if(password_verify($this->password,$user->password)){
            $this->addError('password','Password is incorrect');
            return false;
        }


        return Application::$app->login($user);

    }


    public function labels(): array
    {
        return ['email'=>'Your email',
            'password'=>'Your password'];
    }
}