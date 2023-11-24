<?php
$mysql = mysqli_connect('localhost', 'root', 'cmskorea', 'test');

if ($mysql) {
	echo "DB연결 성공";
} else {
	echo "DB연결 실패 : " . mysqli_error($mysql);
}

// $query = "SELECT * FROM score";
// $rs = mysqli_query($mysql, $query);
// $rows = mysqli_fetch_all($rs);

// echo "<pre>";
// var_dump($rows);
// echo "</pre>";


$fileName = "D:\WorkerSpace\wwwroot\score.txt";

$scores = file($fileName);
$scoreDatas = array();
$scoreAttribute = array();
$Attribute = "";

// 데이터 value 함수
function datasearch ($arr){
	$str = "";
	var_dump($arr);
	if(!empty($arr)){
		foreach ($arr as $a){
			if (is_numeric($a)){
				$str = $str . $a . ", ";
			}
			else{
				$str = $str . "'" . $a . "', ";
			}
		}
	}
	echo $str;
	return $str;
}

//속성 문자열 가져오기
if(file_exists($fileName)){
	$fp = fopen($fileName, 'r');
	if($fp){
		$fg=fgets($fp);
		$scoreAttribute = explode(' ', str_replace("\r\n", "", $fg));
	}
}


//연관배열 만들기
foreach($scores as $index => $score){
	$temp = explode(' ', str_replace("\r\n", "", $score));
	for($i = 0; $i < count($scoreAttribute); $i++){
		$scoreDatas[$index][$scoreAttribute[$i]]  = $temp[$i];
/* 		$scoreDatas[$index]['eng']  = $temp[1];
		$scoreDatas[$index]['kor']  = $temp[2];
		$scoreDatas[$index]['math']  = $temp[3]; */
	}

}
//속성 문자열 만들기
foreach($scoreAttribute as $att){
	$Attribute =  $Attribute . $att . ", ";
}

unset($scoreDatas[0]);

var_dump($scoreAttribute);

//등록 SQL 쿼리
foreach ($scoreDatas as $index => $data){
	$query = "INSERT INTO score (" . $Attribute . " inserttime) VALUE(". datasearch($data). "now());";
	$rs = mysqli_query($mysql, $query);
	
	if (!$rs) {
		echo "등록실패 : " . mysqli_error($mysql);
	}
} 