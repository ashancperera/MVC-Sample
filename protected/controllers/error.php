<?php

class ErrorController extends MainController
{    
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("/protected/models/error.php");
        $this->model = new ErrorModel();
    }
    
    //bad URL request error
    protected function badURL()
    {
        $this->view->output("error");
    }
}

?>
