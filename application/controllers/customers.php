<?php



/**

 * Description of customer

 *

 * @author Faizan Ayubi

 */

use Framework\Registry as Registry;

use Framework\RequestMethods as RequestMethods;



class Customers extends Users {

    // Merchant Salt as provided by Payu
// Merchant key here as provided by Payu
public $MERCHANT_KEY = "2u0rmd";

// Merchant Salt as provided by Payu
public $SALT = "6zteiBW7";
    

    public function index() {

        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }
    /**
     * 
     * 
     * @before _secure
     */

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
$amount =1;
$service = "Service take By Tasksphere";
$user = $this->user;
$posted = ["key"=>$this->MERCHANT_KEY,"txnid"=>$txn, "amount"=>$amount, "productinfo"=>$service, "firstname"=>$user->name, "email"=>$user->email];
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $this->SALT;
    $hash = strtolower(hash('sha512', $hash_string));           
        $view->set("txnid", $txn);
        $view->set("key", $this->MERCHANT_KEY);
        $view->set("hash", $hash);

    }
    /**
     * 
     * 
     * @before _secure
     */
    public function payment_success() {
        $this->changeLayout();
        $this->seo(array(

            "title" => "Happy Customers",

            "keywords" => "account",

            "description" => "account",

            "view" => $this->getLayoutView()

        ));
        
        $view = $this->getActionView();
        if(RequestMethods::post("status"))
        {
           $payu_unique_id= RequestMethods::post("mihpayid");
           $status = RequestMethods::post("status");
           $name = RequestMethods::post("firstname");
           $payment_mode = RequestMethods::post("mode");
           $txnid = RequestMethods::post("txnid");
           $product_info = RequestMethods::post("productinfo");
           $amount = RequestMethods::post("amount");
           $key = RequestMethods::post("key");
           $payment_id = RequestMethods::post("payuMoneyId");
           $other = RequestMethods::post("unmappedstatus");
           if($mode=="CC"|| $mode=="DC"){
               $payment_mode = "Credit or Debit Card";
           }elseif ($mode=="NB") {
               $payment_mode = "Net Banking"; 
            }
            elseif ($mode=="CD") {
                $payment_mode = "Cheque DD";     
            }elseif($mode=="CO"){
            $payment_mode = "Cash";    
            }
        $view->set("trans_success", true);
        $view->set("customer", $name);
        $view->set("mode", $payment_mode);
        $view->set("amount", $amount);
        $view->set("txnid", $txnid);
        
        $paydb = Payment::first(array("transaction_no = ?"=>$txnid));
        if(!$paydb){
            $newPay = new Payment(array(
                "user"=>$this->user->id,
                "amount"=>$amount,
                "job"=>1,
                "transaction_no"=>$txnid,
                "payment_mode"=>$payment_mode,
                "payu_id"=>$payu_unique_id,
                "product_info"=>$product_info,
                "status"=>$status
                ));
                $newPay->save();
            
                }else{
                    echo "the transction id allready exist ";
                }
            
        }
   
    }
    /**
     * 
     * 
     * @before _secure
     */
    public function payment_failed() {
        $this->changeLayout();
        $this->seo(array(
            "title" => "Happy Customers",
            "keywords" => "account",
            "description" => "account",
            "view" => $this->getLayoutView()
        ));
        
        $view = $this->getActionView();
        if(RequestMethods::post("status")) {
            //$hash= RequestMethods::post("hash");
            $status = RequestMethods::post("status");
            $payu_unique_id= RequestMethods::post("mihpayid");
            $name = RequestMethods::post("firstname");
            $mode = RequestMethods::post("mode");
            $txnid = RequestMethods::post("txnid");
            $amount = RequestMethods::post("amount");
            $product_info = RequestMethods::post("productinfo");
            $key = RequestMethods::post("key");
            $payment_id = RequestMethods::post("payuMoneyId");
            $other = RequestMethods::post("unmappedstatus");
            if($mode=="CC"){
                $payment_mode = "Credit or Debit Card";
            } elseif ($mode=="NB") {
                $payment_mode = "Net Banking";
            } elseif($mode=="CD") {
                $payment_mode = "Cheque DD";
            } elseif($mode=="CO") {
                $payment_mode = "Cash";
            }
            $ret_par = ["hash"=>$hash, "payU Unique Id"=>$payu_unique_id,"name"=>$name, "Payment Mode"=>$payment_mode,"transaction  id"=>$txnid, "amount"=>$amount];
           
                   $view->set("trans_failed", true);
        $view->set("customer", $name);
        $view->set("mode", $payment_mode);
        $view->set("amount", $amount);
        $view->set("txnid", $txnid);
        
        $paydb = Payment::first(array("transaction_no = ?"=>$txnid));
        if(!$paydb){
            $newPay = new Payment(array(
                "user"=>$this->user->id,
                "amount"=>$amount,
                "job"=>1,
                "transaction_no"=>$txnid,
                "payment_mode"=>$payment_mode,
                "payu_id"=>$payu_unique_id,
                "product_info"=>$product_info,
                "status"=>$status
            ));
            $newPay->save();
            
        }else{
            echo "the transction id allready exist ";
        }
        } 
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