<?php
class NewsController extends MainController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("protected/models/news.php");
        $this->model = new NewsModel();
    }
    
    //default method
    protected function index()
    {
		$id = ((!empty($this->urlValues["id"]) && is_numeric($this->urlValues["id"])) ? $this->urlValues["id"]: 0); //simple validation to avoid sql injections
		$news = $this->model->loadNews($id);
		$this->layout = "main"; // Per controller template can be set - may be a deviation of main template
        $this->view->output("news", array("news"=>$news)); // The view to render (news) can be decided here + all view variables
    }
	
	protected function moreinfo()
    {
		$id = ((!empty($this->urlValues["id"]) && is_numeric($this->urlValues["id"])) ? $this->urlValues["id"]: 0); //simple validation to avoid sql injections
		$news = $this->model->loadNewsInfo($id);
		$this->layout = "main"; // Per controller template can be set - may be a deviation of main template
        $this->view->output("newsInfo", array("news"=>$news)); // The view to render can be decided here + all view variables
    }
}

?>
