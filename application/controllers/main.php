<?php

/**
 * Description of users
 *
 * @author Faizan Ayubi
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;

class Main extends Controller {

    public function login($ep = NULL, $password = NULL) {
        if (isset($ep)) {
            if(strpos($ep, "@")){
                $user = User::first(array("email = ?" => $ep, "password = ?" => sha1($password)));
            } else {
                $user = User::first(array("phone = ?" => $ep, "password = ?" => sha1($password)));
            }
        }
        
        if(Framework\RequestMethods::post("login")){
            $ep = Framework\RequestMethods::post("ep");
            $password = Framework\RequestMethods::post("password");
            if(strpos($ep, "@")){
                $user = User::first(array("email = ?" => $ep, "password = ?" => sha1($password)));
            } else {
                $user = User::first(array("phone = ?" => $ep, "password = ?" => sha1($password)));
            }
        }
        
        if(isset($user)){
            $this->user = $info["user"];
        }
    }
    
    public function logout() {
        $this->setUser(false);
        self::redirect("/home");
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
