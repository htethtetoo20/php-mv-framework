<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\LoginForm;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request,Response $response){
        $loginForm=new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
            }
        }

        return $this->render('login',['model'=>$loginForm]);
    }

    public function register(Request $request){
        $errors=[];
        $registerModel=new User();
        $this->setLayout('auth');
        if($request->isPost()){
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()){
                Application::$app->session->setFlash('success','Thanks for the registration');
                Application::$app->response->redirect('/');

            }

            return $this->render('register',['model'=>$registerModel]);
        }

       return $this->render('register',['model'=>$registerModel]);
    }

    public function logout(Request $request,Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {

        return $this->render('profile');
    }


}