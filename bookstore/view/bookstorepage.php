<?php
$folder = array(
		"최"=>"./../file/choi",
		"홍"=>"./../file/hong",
		"김"=>"./../file/kim",
);
if(isset($_POST['searchName'])){
	$searchName = $_POST['searchName'];
	$directory = ($folder[$_POST['searchName']]);
}
if(isset($_POST['fileName'])){
	$fileName= $_POST['fileName'];
}
//파일을 읽는다
if(is_file($directory . "/" . $fileName)){
	$content = file($directory . "/" .$fileName);
	/* echo "<pre>";
	var_dump($content);
	echo "</pre>"; */
	echo json_encode($content);
}