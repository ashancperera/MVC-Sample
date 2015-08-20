<?php

class Loader {
    
    private $controllerName;
    private $controllerClass;
    private $action;
    private $urlValues;
    
    
    public function __construct() {
        $this->urlValues = $_GET; //store URL request params on object creation
        
        if ($this->urlValues['controller'] == "") {
            $this->controllerName = "home";
            $this->controllerClass = "HomeController";
        } else {
            $this->controllerName = strtolower($this->urlValues['controller']);
            $this->controllerClass = ucfirst(strtolower($this->urlValues['controller'])) . "Controller";
        }
        
        if ($this->urlValues['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }
                  
    //factory method - create the controller as an object
    public function createController() {
        //check if the controller's class file exists
        if (file_exists("protected/controllers/" . $this->controllerName . ".php")) {
            require("protected/controllers/" . $this->controllerName . ".php");
        } else {
            require("protected/controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
                
        // check if the class file exsists and include it
        if (class_exists($this->controllerClass)) {
            $parents = class_parents($this->controllerClass);
            
            //if any class is inhetited from MainController
            if (in_array("MainController",$parents)) {   
                //does the requested controller contains the requested action ?
                if (method_exists($this->controllerClass,$this->action))
                {
                    return new $this->controllerClass($this->action,$this->urlValues);
                } else {
                    //bad action/method error
                    require("protected/controllers/error.php");
                    return new ErrorController("badurl",$this->urlValues);
                }
            } else {
                //bad controller error
                require("protected/controllers/error.php");
                return new ErrorController("badurl",$this->urlValues);
            }
        } else {
            //bad controller error
            require("protected/controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
    }
}

?>
