<?php
class DBconn {
	private $host = 'localhost';
	private $userid = "root";
	private $password = "cmskorea";
	private $database = "dbboard";
	protected $db;
	
	//생성자
	public function __construct(){
		$this->db = $this->connectDB();
	}
	//소멸자
	function __destruct() {
		mysqli_close($this->connectDB());
	}	
	
	private function connectDB() {
		$dbconn = mysqli_connect($this->host, $this->userid, $this->password, $this->database);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			return $dbconn;
		}
	}
	
	//DB Query Custom 함수
	function getDbData($table, $row, $var, $column) {
		$result = mysqli_query($this->db,'select '. $column .' from ' . $table . ' where ' . $row . "=" . $var . ";");
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	// DB Query result 함수
	function Dbresult($table, $row, $var, $column){
		$result = mysqli_query($this->db,'select ' . $column . ' from ' . $table . ' where ' . $row . "='" . $var . "';");
		return $result;
	}
	
	//DB데이터 ARRAY -> 테이블에 출력할 데이터 배열
	function getDbSortArray($table, $row, $var, $flddata,$orderby,$rowsPage,$curPage){
		$sql = 'select ' . $flddata . ' from ' . $table . ' where ' . $row . "='" . $var . "'order by " . $orderby . " limit " . (($curPage-1)*$rowsPage) . ", " . $rowsPage . ";";
		$result = mysqli_query($this->db,$sql);
		
		if($result){
			return $result;
		}
	}
	//DB데이터 ARRAY -> 테이블에 출력할 데이터 배열
	function getDbFindArray($table, $row, $var, $flddata,$rowsPage,$curPage){
		$sql = 'select ' . $flddata . ' from ' . $table . ' where ' . $row . " LIKE '%" . $var . "%' limit " . (($curPage-1)*$rowsPage) . ", " . $rowsPage . ";";
		$result = mysqli_query($this->db,$sql);
		
		if($result){
			return $result;
		}
	}
	//DB데이터 ARRAY -> 페이징
	function getDbPageArray($table,$rowsPage,$curPage){
		$sql = 'select * from ' . $table . " limit " . (($curPage-1)*$rowsPage) . ", " . $rowsPage . ";";
		$result = mysqli_query($this->db,$sql);
		
		if($result){
			return $result;
		}
	}
	//DB데이터 레코드 총 개수
	function getDbRows($table, $row, $var){ 
		$sql = 'select count(*) from '.$table. ' where ' . $row . " LIKE '%" . $var . "%';";
		if($result = mysqli_query($this->db,$sql)){
			$rows = mysqli_fetch_row($result);
			return $rows[0] ? $rows[0] : 0;
		}
	}
	function getDbAllRows($table){
		$sql = 'select count(*) from '.$table.";";
		if($result = mysqli_query($this->db,$sql)){
			$rows = mysqli_fetch_row($result);
			return $rows[0] ? $rows[0] : 0;
		}
	}
	//DB삽입
	function getDbInsert($table,$key,$val){
		mysqli_query($this->db,"insert into " . $table." " . $key . " values" . $val);
	}
		
	//DB업데이트
	function getDbUpdate($table,$set, $row, $var){
		mysqli_query($this->db,"update " . $table . " set " . $set . "where '" . $row . "='" . $var . "';");
	}
	//DB삭제
	function getDbDelete($table, $row, $var){
		mysqli_query($this->db,"delete from " . $table . ' where ' . $row . "='" . $var . "';");
	}
	//SQL필터링    
	function getSqlFilter($sql){
		return $sql;
	}
 	function data_list($table) {
		$query = "SELECT * FROM " . $table;
		$rs = mysqli_query($this->db, $query);
		
		
		if($rs){
			//$rows = mysqli_fetch_assoc($rs);
			//return $rows;
			return $rs;
		}
	}
	function data_search($table, $searchrow, $row, $var) {
		$query = "SELECT " . $searchrow . " FROM " . $table . " where " . $row . "='" . $var . "';";
		$rs = mysqli_query($this->db, $query);
		
		$rows = mysqli_fetch_all($rs);
		
		
		if (empty($rows))
			return false;
			else
				return $rows[0][0];
	}
}

?>