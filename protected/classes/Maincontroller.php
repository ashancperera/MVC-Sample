<?php
abstract class MainController {
    
    protected $urlValues;
    protected $action;
    protected $model;
    protected $view;
	public $layout;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
                
        //Create the view object
        $this->view = new View(get_class($this), (empty($this->layout) ? "main": ""));
    }
        
    //executes the requested method
    public function callAction() {
        return $this->{$this->action}();
    }
}

?>
