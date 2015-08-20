<?php
class BaseModel {

	private $this_conn;
	
    //create the base and utility objects available to all models on model creation
    public function __construct()
    {
		$this->create_connection();
    }

	private function create_connection() { //Creates DB connection
	
		$server = "localhost";
		$user = "root";
		$pwd = "";
		$db = "news";
		
		$conn=mysql_connect($server, $user, $pwd, false, MYSQL_CLIENT_INTERACTIVE);

		if (!$conn) {
			echo "DB Connection not established";
			exit;
		}

		if (!mysql_select_db($db)) {
			echo "DB not selected";
			exit;
		}

		$this->this_conn = $conn;
		return $conn;
	}
	
	public function execute($strSQL, $debug=false) {// Execute query
		
		if ($debug==true)
		{
			echo("Executing: $strSQL<br/>");
		}
		if (empty($this->this_conn))		
			$result=mysql_query($strSQL);
		else 
			$result=mysql_query($strSQL, $this->this_conn);
		
		return $result;
	}
	   	
	public function fetchArray($result) { // Fetch dataset
		return mysql_fetch_array($result, MYSQL_ASSOC);		
   	}
	
	public function Numrows($result) { // Returns numrows
		return mysql_num_rows($result); 
	}
		
}

?>
