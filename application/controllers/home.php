<?php

/**
 * The Default Example Controller Class
 *
 * @author Faizan Ayubi
 */

class Home extends Users {

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
    
    public function contact() {
        $this->seo(array(
            "title" => "TaskSphere",
            "keywords" => "TaskSphere",
            "description" => "TaskSphere",
            "view" => $this->getLayoutView()
        ));
        
        $view = $this->getActionView();
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
