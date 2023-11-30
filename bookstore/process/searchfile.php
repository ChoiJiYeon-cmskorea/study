<?php
class DBbookclass{
	private $host = 'localhost';
	private $userid = "root";
	private $password = "cmskorea";
	private $database = "bookstore";
	protected $db;
	
	//생성자
	public function __construct(){
		$this->db = $this->classConnectDB();
	}
	//소멸자
	function __destruct() {
		mysqli_close($this->classConnectDB());
	}	
	
	private function classConnectDB() {
		$classdbconn = mysqli_connect($this->host, $this->userid, $this->password, $this->database);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			return $classdbconn;
		}
	}
	// DB 책 검색 함수
	function DbsearchBook($table, $row, $var, $column){
		$result = mysqli_query($this->db,'select ' . $column . ' from ' . $table . ' where ' . $row . " LIKE '%" . $var . "%';");
		return $result;
	}
}