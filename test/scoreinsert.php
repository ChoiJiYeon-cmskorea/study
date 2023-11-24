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

foreach($scores as $index => $score){
	$temp = explode(' ', $score);
	$scoreDatas[$index]['name']  = $temp[0];
	$scoreDatas[$index]['eng']  = $temp[1];
	$scoreDatas[$index]['kor']  = $temp[2];
	$scoreDatas[$index]['math']  = $temp[3];
}
unset($scoreDatas[0]);

foreach ($scoreDatas as $index => $data){
	$query = "INSERT INTO score (name, eng, kor, math, inserttime) VALUE( '". $data['name'] . "', " . $data['eng'] . ", " . $data['kor'] . ", " . $data['math'] . ", now());";
	$rs = mysqli_query($mysql, $query);
	
	if (!$rs) {
		echo "등록실패 : " . mysqli_error($mysql);
	}
}
