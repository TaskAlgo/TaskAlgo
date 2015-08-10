<?php



/**

 * The Default Example Controller Class

 *

 * @author Faizan Ayubi

 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;
use Shared\Controller as Controller;

class Home extends Controller {



    public function index() {

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));

        $view = $this->getActionView();

        

        $zones = Zone::all(array("live = ?" => true), array("DISTINCT city"));

        $tasks = Task::all(array("live = ?" => true, "parent != ?" => 0), array("id", "title"));

        

        $view->set("tasks", $tasks);

        $view->set("zones", $zones);

        
    }

    

    public function about() {

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }
     public function blog() {

        $this->seo(array(

            "title" => "Blog::TaskSphere",

            "keywords" => "TaskSphere, Blog, Coupon code, ",

            "description" => "TaskSphere  blog page where you can know more about what are we doing",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

    

    public function contact() {

        $view = $this->getActionView();

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));
         $view->set("errors", array());

        if(RequestMethods::post("action")=="query"){
            $fname = RequestMethods::post("fname");
            $lname = RequestMethods::post("lname");
            $email = RequestMethods::post("email");
            $pin = RequestMethods::post("pin");
            $message = RequestMethods::post("message");
            $post = new Query(array("fname"=>$fname, "lname"=>$lname, "pin"=>$pin, "email"=>$email, "message"=>$message));
             if ($post->validate()) {
                $post->save();
               $view->set("success", "Your Query has been recorded We will contact you soon.");
            }
            
            $view->set("errors", $post->getErrors());
        }

    }

    

    public function faq() {

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

    

    public function terms() {

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

    

    public function privacy() {

        $this->seo(array(

            "title" => "TaskSphere",

            "keywords" => "TaskSphere",

            "description" => "TaskSphere",

            "view" => $this->getLayoutView()

        ));

        

        $view = $this->getActionView();

    }

}

