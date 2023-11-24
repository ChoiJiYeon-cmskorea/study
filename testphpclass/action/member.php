<?php
require_once $_SERVER['DOCUMENT_ROOT']."/testphpclass/dbcontroller.php";


function insert_member(){
	$DBclass = new DBconn();
	$inputId = $_POST['memberId'];
	$inputPw = $_POST['memberPw'];
	$inputName = $_POST['memberName'];
	$inputTel = $_POST['memberTel'];
	
    //$binary = bin2hex($inputPw);
    //$normal = $inputPw;
	$searchId = $DBclass->data_search( "member", "id","id", $inputId);
	if($searchId){
		echo( "<script>alert('중복된 아이디입니다! 다시 작성해주세요.');</script>");
		echo("<script>location.replace('../web/signup.php');</script>");
	}else{
		$DBclass->getDbInsert("member", "( id, name, telNumber, insertTime, updateTime)", "( '". $inputId."' ,'". $inputName."' ,'". $inputTel."' , now(), now())");
		$query = "INSERT INTO auth_identity ( id, pw, name, insertTime) VALUE( '". $inputId ."' ,'". md5($inputPw) ."' ,'". $inputName."' , now());";
		mysqli_query(connetDB(), $query);
		$DBclass->getDbInsert("auth_identity", "( id, pw, name, insertTime)", "( '". $inputId ."' ,'". md5($inputPw) ."' ,'". $inputName."' , now())");
		echo( "<script>alert('회원 가입이 완료되었습니다!');</script>");
		echo("<script>location.replace('../web/login.php');</script>");
	}
}
if(isset($_POST['memberId']) && isset($_POST['memberPw']) && isset($_POST['memberName']) && isset($_POST['memberTel'])){
	insert_member();
}else{echo "전달 받은 값이 없습니다!";}
?>