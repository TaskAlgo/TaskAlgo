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
        $this->changeLayout();
        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));
        $view = $this->getActionView();
        // Merchant key here as provided by Payu
$txn = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
// Merchant Salt as provided by Payu
// Merchant key here as provided by Payu
$MERCHANT_KEY = "2u0rmd";

// Merchant Salt as provided by Payu
$SALT = "6zteiBW7";

$posted = ["key"=>$MERCHANT_KEY,"txnid"=>$txn, "amount"=>500, "productinfo"=>"Service take By Tasksphere", "firstname"=>"MERAJ AHMAD SIDDIQUI", "email"=>"msiddiqui.jmi@gmail.com"];
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));           
        $view->set("txnid", $txn);
        $view->set("key", $MERCHANT_KEY);
        $view->set("salt", $SALT);
        $view->set("hash", $hash);

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

