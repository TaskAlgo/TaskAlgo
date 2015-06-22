<?php
/**
 * Description of tasker
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Tasker extends Main {
    public function index() {
        
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
            
            if(isset($user->email)){
                $this->login($user->email, $user->password);
            } else{
                $this->login($user->phone, $user->password);
            }
            
            self::redirect("/tasker/skills");
        }
    }
    
    public function skills() {
        
    }
}
