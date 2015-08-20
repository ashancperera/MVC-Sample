<?php

class NewsModel extends BaseModel
{
    
    public function __construct() { //Does the basic db connection set up
        parent::__construct();
    }
	
	public function loadNews($page=0) {
		$res = $this->execute("SELECT * FROM newslist WHERE publish_status=1 LIMIT 10 OFFSET " . ($page * 10)); // Select 10 news per page
		while($row = $this->fetchArray($res)) {
			$news[] = $row;
		}
		return $news;
	}
	public function loadNewsInfo($id){
		$res = $this->execute("SELECT * FROM newslist WHERE id=" . $id); // Load selected news
		return $this->fetchArray($res);
	}
}

?>
