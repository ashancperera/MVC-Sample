<?php
class HomeController extends MainController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("protected/models/home.php");
        $this->model = new HomeModel();
    }
    
    //default method
    protected function index()
    {
		$this->layout = "main";
        $this->view->output("home");
    }
}

?>
