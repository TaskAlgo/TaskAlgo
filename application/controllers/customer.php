<?php

/**
 * Description of customer
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Customer extends Main {

    public function register() {
        if (RequestMethods::post("action") == "addCustomer") {
            $user = new User(array(
                "name" => RequestMethods::post("name"),
                "email" => RequestMethods::post("email", ""),
                "phone" => RequestMethods::post("phone"),
                "gender" => RequestMethods::post("gender", ""),
                "password" => sha1(RequestMethods::post("password", rand(10000, 999999)))
            ));
            $user->save();
        }
    }

}
