<?php
namespace app\controllers;
use htethtetoo\phpmvc\Application;
use htethtetoo\phpmvc\Controller;
use htethtetoo\phpmvc\Request;
use htethtetoo\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function home(){
        $params=['name'=>'PHP MVC FRAMEWORK'];
        return $this->render('home',$params);
    }
    public function contact(Request $request,Response $response){
        $contact=new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success','Thank for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact',['model'=>$contact]);
    }
    public function handleContact(Request $request){
        $body=$request->getBody();
        return "Handling submitted data";
    }


}