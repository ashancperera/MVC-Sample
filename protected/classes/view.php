<?php
class View {    
    
    protected $viewFile;
	private $layout;
	private $controllerName;
    
    //establish view location on object creation
    public function __construct($controllerClass, $layout="main") {
        $this->controllerName = str_replace("Controller", "", $controllerClass);
		$this->layout = $layout;
    }
               
    //output the view
    public function output($viewName, $view=array()) {

		$this->viewFile = "protected/views/" . $this->controllerName . "/" . $viewName . ".php"; 
        $templateFile = "protected/views/layout/". $this->layout .".php";
        
        if (file_exists($this->viewFile)) {
            if ($this->layout) {
                //include the full template
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("protected/views/error/error.php");
                }
            } else {
                //Render the view file directly without the template i.e. ajax requets
                require($this->viewFile);
            }
        } else {
            require("protected/views/error/error.php");
        }
        
    }
}

?>