<?php 
//PHP에서는 변수 선언 필요 없다.
$name="이승혁의 PHP5 Web Proogramming guied";
// $code = 55;
?>


<html>
<!-- html 주석처리방법 -->
<head>
<title>PHP 5 스크립트</title>
</head>
<body>
지금시간은<b style="font-family:verdana"><?php echo date("Y-m-d H:i:s")?> 
<?php 
// PHP 주석 처리 방법
# PHP 주석 처리 방법#
?>

</b>
입니다.
</br>

<br>테스트 <b style="font-family:verdana" ><?php echo $name; ?> </b><br>


<?php 

// 2차원 배열을 이용하여 세 학생이 받은 다섯 과목 점수의 합계와 평균 계산    
$score = array(
  array(88, 98, 96, 77, 63), 
  array(86, 77, 66, 86, 93), 
  array(74, 83, 95, 86, 97)); 
  // 입력된 점수와 배열의 인뎃스 출력    
  for($i = 0; $i < 3; $i++) {
  	for($j = 0; $j < 5; $j++) {
  		echo "\$score[$i][$j] = ".$score[$i][$j]."<br/>";
	  	echo "<br/>";}
}
  // 각 학생의 합계와 평균   
  	for($i = 0; $i < 3; $i++) {$sum = 0;
  	for($j = 0; $j < 5; $j++) {$sum = $sum + $score[$i][$j];}
  	$avg = $sum / 5;
  	$student_num = $i + 1;
  	echo "$student_num 번째 학생의 점수 => 합계 : $sum, 평균 : $avg<br/>";
  	}
/* 
$language_list = array(
		array(
				"idx" => 1,
				"name" => "ENG",
				"code" => "en"
		),
		array(
				"idx" => 2,
				"name" => "KOR",
				"code" => "ko"
		),
		array(
				"idx" => 3,
				"name" => "JAP",
				"code" => "ja"
		)
);

$language = 'en';
$key = array_search($language, array_column($language_list, 'code')); // $key = 1
echo $language_list[$key]['name']; // print : ENG
 */
?>
</body>
</html>


