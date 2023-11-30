<?php
if(isset($_POST['searchName'])){
	$searchName = $_POST['searchName'];
}
if(isset($_POST['directory'])){
	$directory = ($_POST['directory']);

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