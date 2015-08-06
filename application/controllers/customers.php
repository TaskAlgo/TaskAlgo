<?php



/**

 * Description of customer

 *

 * @author Faizan Ayubi

 */

use Framework\Registry as Registry;

use Framework\RequestMethods as RequestMethods;



class Customers extends Users {

    

    public function index() {

        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

    public function payments() {

        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));
        // Merchant key here as provided by Payu
$MERCHANT_KEY = "JBZaLc";

// Merchant Salt as provided by Payu
$SALT = "GQs7yium";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

        $view->set("key", $MERCHANT_KEY);
        $view->set("salt", $SALT);
        $view->set("hash", $Hash);

        $view = $this->getActionView();

    }

    public function payment_success() {

        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

    public function payment_failed() {

        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }



    public function register() {

        $this->seo(array(

            "title" => "Create Your account",

            "keywords" => "get free services, register",

            "description" => "create your account",

            "view" => $this->getLayoutView()

        ));

        $view = $this->getActionView();

        

        if (RequestMethods::post("action") == "addCustomer") {

            $user = new User(array(

                "name" => RequestMethods::post("name"),

                "email" => RequestMethods::post("email", ""),

                "phone" => RequestMethods::post("phone"),

                "gender" => RequestMethods::post("gender", ""),

                "password" => sha1(RequestMethods::post("password", rand(10000, 999999)))

            ));

            

            $user->save();

            $this->user = $user;

            

            self::redirect("/users");

        }

    }
    
        public function changeLayout() {

        $this->defaultLayout = "layouts/standard";

        $this->setLayout();

    }



}

