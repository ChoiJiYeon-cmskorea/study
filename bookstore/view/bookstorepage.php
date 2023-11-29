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
if(is_file($directory . "/" . $fileName)){
	$content = file($directory . "/" .$fileName);
	return $content;
}