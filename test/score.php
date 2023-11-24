<?php

//20231106 학생성적정보 관리(평균,총점)
$scores = array(
	"kim"  => array("kor" => 90, "eng" => 75, "math" => 88),
	"hong" => array("kor" => 80, "eng" => 78, "math" => 92),
	"choi" => array("kor" => 45, "eng" => 65, "math" => 90)
);

$scoreslank= array(); // 행-열 바꾼 값 저장 배열 (과목별 순위를 구하기 위한 배열)
$scoreTotal = array();  // 학생들의 전체 성적 저장 배열(학생 총 순위를 구하기 위한 배열)



//***********메인 foreach문************
foreach($scores as $key => $value){
	$total = 0;
	$average = 0;
	
	foreach($value as $arrkey => $arrvalue){
		$total += $arrvalue;
		
		// 과목별 순위성적
		$scoreslank[$arrkey][$key] = $arrvalue;
		
		if (!array_key_exists($arrkey, $scoreTotal)) {
			$scoreTotal[$arrkey] = 0;
		}
		$scoreTotal[$arrkey] += $arrvalue;
	}
	
	$average = $total / count($scores[$key]);
	echo $key." => 총점 : " . $total . "점, 평균 : " . round($average) . "점" . "<br/> <br/>";
}


// 	$subaverage = $subtotal / count($scores[$key]);
// 	echo $key." => 총점 : " . $subtotal . "점, 평균 : " . round($subaverage) . "점" . "<br/>";

echo "총합 : kor : ".$scoreTotal['kor'] . "점, eng : " . $scoreTotal['eng'] . "점, math : " .$scoreTotal['math'] . "점 <br/>";
echo "평균 : kor : " . round($scoreTotal['kor']/count($scores[ $key])) . "점, eng : "
		.  round($scoreTotal['eng']/count($scores[$key])) . "점, math : "
				.  round($scoreTotal['math']/count($scores[$key])) . "점 <br/>";



//***********과목별 순위 구하기************
echo"<br/>과목별순위 : <br/>";
foreach ($scoreslank as $exkey => $exvalue){
	$index = 1;
 	arsort($exvalue);
 	echo $exkey . " : ";
	foreach (array_keys($exvalue) as $exkeyi){
		echo " " . $index . ". " . $exkeyi;
		$index ++;
	}
	echo "<br/>";
} 


//***********학생성적순위 구하기************
$totalscoreslank= array();
foreach($scores as $key => $value){
	$sum = 0;
	foreach($value as $arrkey => $arrvalue){
		$sum += $arrvalue;
	}
	$totalscoreslank[$key] = round($sum / count($scores[$key]));
}
arsort($totalscoreslank);


echo"<br/>학생성적순위 :<br/>";
$index = 1;
foreach ($totalscoreslank as $key => $value){
	echo " " . $index . ". " . $key;
	$index ++;
}

//***********출력문제************
// kim  => 총점 : 250점, 평균 : 88.5점
// hong => 총점 : 250점, 평균 : 88.5점
// choi => 총점 : 250점, 평균 : 88.5점

// 평균 : kor : 90점, eng : 30점, math : 50점
// 과목별 순위 : 
//   kor : kim, choi, hong
//   ...
//    ...
// 학생성적순위 : 1. hong, 2. choi, 3. kim
    

?>