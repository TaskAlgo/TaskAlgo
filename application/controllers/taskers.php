<?php

/**
 * Description of tasker
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Taskers extends Users {

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
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();

        $zones = Zone::all(array("live = ?" => true), array("DISTINCT city", "landmark", "id"));
        $tasks = Task::all(array("live = ?" => true, "parent != ?" => 0), array("id", "title"));

        $view->set("tasks", $tasks);
        $view->set("zones", $zones);

        if (RequestMethods::post("action") == "newTasker") {
            $exist = User::first(array("phone = ?" => RequestMethods::post("phone")));
            if (!$exist) {
                $user = new User(array(
                    "name" => RequestMethods::post("name"),
                    "email" => RequestMethods::post("email"),
                    "phone" => RequestMethods::post("phone"),
                    "gender" => RequestMethods::post("gender"),
                    "password" => sha1(RequestMethods::post("password"))
                ));
                $user->save();

                $skill = new Skill(array(
                    "user" => $user->id,
                    "zone" => RequestMethods::post("zone"),
                    "task" => RequestMethods::post("task")
                ));
                $skill->save();

                $this->user = $user;
                self::redirect("/taskers/skills");
            } else {
                $view->set("success", 'User already exist please login <a href="/login">here</a>');
            }
        }
    }

    public function skills() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
    }

}
