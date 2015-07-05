<?php

/**
 * Description of users
 *
 * @author Faizan Ayubi
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Users extends Controller {

    /**
     * @before _secure
     */
    public function index() {
        $this->seo(array(
            "title" => "Account",
            "keywords" => "Account",
            "description" => "Account",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();

        if (RequestMethods::post("action") == "saveUser") {
            $user = User::first(array("id = ?" => $this->user->id));
            $user->name = RequestMethods::post("name");
            $user->email = RequestMethods::post("email");
            $user->gender = RequestMethods::post("gender");
            $user->phone = RequestMethods::post("phone");

            $user->save();
            $view->set("user", $user);
            $view->set("success", "Account Updated Successfully");
        }

        if (RequestMethods::post("action") == "changePassword") {
            $user = User::first(array("id = ?" => $this->user->id));
            $password = RequestMethods::post("opassword");
            if ($user->password == sha1($password)) {
                $user->password = sha1(RequestMethods::post("npassword"));
                $user->save();
                $view->set("success", "Password Changed Successfulyy");
            } else {
                $view->set("success", "Old Password incorrect, Try again");
            }
        }
    }

    /**
     * Logins the user to session and rediect to profile
     */
    public function login() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));

        $view = $this->getActionView();

        if (RequestMethods::post("action") == "login") {
            $ep = RequestMethods::post("ep");
            $password = RequestMethods::post("password");

            if (strpos($ep, "@")) {
                $user = User::first(array("email = ?" => $ep, "password = ?" => sha1($password)));
            } else {
                $user = User::first(array("phone = ?" => $ep, "password = ?" => sha1($password)));
            }

            if (isset($user)) {
                $this->user = $user;
                $manager = Manager::all(array("user = ?" => $user->id));
                if($manager){
                    $session = Registry::get("session");
                    $session->set("manager", $manager);
                }
                self::redirect("/users");
            } else {
                $view->set("success", "Incorrect email/phone or password");
            }
        }
    }
    
    public function forgotpassword() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));

        $view = $this->getActionView();
    }
    
    public function close() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));

        $view = $this->getActionView();
    }
    
    public function bookService($city=NULL, $taskid=NULL) {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        $zones = Zone::all(array("live = ?" => true), array("id", "landmark"));
        $tasks = Task::all(array("live = ?" => true), array("id", "title", "parent"));
        
        if(RequestMethods::post("action") == "bookService"){
            $city = RequestMethods::post("city");
            $taskid = RequestMethods::post("task");
            
            $location = new Location(array(
                "street" => RequestMethods::post("street"),
                "zone" => RequestMethods::post("zone")
            ));
            $location->save();
            
            $job = new Job(array(
                "user" => $this->user->id,
                "task" => RequestMethods::post("task"),
                "location" => $location->id,
                "comment" => RequestMethods::post("comment"),
                "cost" => "200",
                "scheduled" => "2015-07-05",
                "status" => "NOT_ASSIGNED"
            ));
            $job->save();
            self::redirect("/users/bookConfirm");
        }
        
        $view->set("taskid", $taskid);
        $view->set("tasks", $tasks);
        $view->set("zones", $zones);
    }
    
    public function bookConfirm() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));

        $view = $this->getActionView();
    }

    /**
     * Logs Out the User
     */
    public function logout() {
        $this->setUser(false);
        self::redirect("/home");
    }

    /**
     * Disabled HTML View
     */
    public function noview() {
        $this->willRenderLayoutView = false;
        $this->willRenderActionView = false;
    }

    public function sync() {
        $this->noview();
        $db = Registry::get("database");
        //$db->sync(new Task());
    }

    /**
     * Logs Messages
     * @param type $message any text to b logged
     */
    public function log($message = "") {
        $logfile = APP_PATH . "/logs/" . date("Y-m-d") . ".txt";
        $new = file_exists($logfile) ? false : true;
        if ($handle = fopen($logfile, 'a')) {
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time() + 1800);
            $content = "[{$timestamp}]{$message}\n";
            fwrite($handle, $content);
            fclose($handle);
            if ($new) {
                chmod($logfile, 0755);
            }
        } else {
            echo "Could not open log file for writing";
        }
    }

}
