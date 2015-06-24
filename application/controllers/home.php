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
