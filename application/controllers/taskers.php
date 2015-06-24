<?php
/**
 * Description of tasker
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Taskers extends Main {
    public function index() {
        $this->seo(array(
            "title" => "Super Taskers",
            "keywords" => "account",
            "description" => "account",
            "view" => $this->getLayoutView()
        ));
        
        $view = $this->getActionView();
    }
    
    public function register() {
        if(RequestMethods::post("newTasker")){
            $user = new User(array(
                "name" => RequestMethods::post("name"),
                "email" => RequestMethods::post("email"),
                "phone" => RequestMethods::post("phone"),
                "gender" => RequestMethods::post("gender"),
                "password" => sha1(RequestMethods::post("password"))
            ));
            $user->save();
            
            self::redirect("/tasker/skills");
        }
    }
    
    public function skills() {
        
    }
}
