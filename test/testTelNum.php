<html>
<head>
 <title> PHP 정규표현식 TEST </title>
</head>
<body>
 <form method="post" action="testTelNum.php">
  <table> 
	<tr>
        <th>전화번호 (000-0000-0000 형식에 맞추어 기입하세요.)</th>
        <td><input type="text" name="PhoneNo" value=""></td>
    </tr>
  </table>
  <input type="submit" value="Submit" />
 </form>
</body>
</html>

<?php 

//전달받은 데이터를 변수로 저장 
$phoneNo = $_POST['PhoneNo'];

//전화번호 데이터에 대한 패턴 작성
$phonePattern = '/^01(0|1|6|7|8|9)-?([0-9]{4})-?([0-9]{4})$/';


//패턴 체크(유효성 검사)
if(preg_match($phonePattern, $phoneNo, $match)){
	echo "전화번호 : ".$phoneNo."<br>";
	var_dump($match);
	echo "<br>";
} else {
	echo "올바른 전화번호가 아닙니다. 다시 입력해 주세요. <br>";
}


?>