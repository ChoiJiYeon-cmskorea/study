<?php
use PMA\libraries\Console;

function connetDB(){
	$mysql = mysqli_connect('localhost', 'root', 'cmskorea', 'test');
	
	if ($mysql) {
		//echo "DB연결 성공";
		return $mysql;
	} else {
		//echo "DB연결 실패 : " . mysqli_error($mysql);
	};
}


function product_list($sql) {
	$query = "SELECT * FROM product";
	$rs = mysqli_query($sql, $query);
// 	$rows = mysqli_fetch_all($rs);
	
// 	echo "<pre>";
// 	var_dump($rows);
// 	echo "</pre>";
// 	return $rows;

	$rows = array();
	while(!!($row = mysqli_fetch_assoc($rs))) {
		$rows[] = $row;
	}
	
	return $rows;
};

function set_product($sql){
	//echo "set_product 확인용";

	$data = array();
	foreach(product_list($sql) as $jb_row ) {
		$data[] = array(
				'index'	=> $jb_row['ind'],
				'name'	=> $jb_row['name'],
				'price'	=> $jb_row['price'],
				'time'	=> $jb_row['time'],
		);
//  		echo
// 			$jb_row["ind"].'/'
// 			. $jb_row["name"].'/'
// 			. $jb_row["price"].'/'
// 			. $jb_row["time"].'//'; 
/* 			echo
			'<p>'
					. $jb_row["ind"]
					. $jb_row["name"]
					. $jb_row["price"]
					. $jb_row["time"]
					. '</p>';  */
/* 		array_push($indexs, array('index' =>  $jb_row["ind"]));
		array_push($names, array('name' => $jb_row["name"]));
		array_push($prices, array('price' => $jb_row["price"]));
		array_push($times, array('time' =>  $jb_row["time"])); */
	}
	//$data = array("indexs" => $index , "names" => $names, "prices" => $prices, "times" => $times);
	//echo(json_encode($data, JSON_UNESCAPED_UNICODE));
	echo json_encode($data);
}

function insert_product($sql){
	$inputname = $_POST['inputname'];
	$inputprice = $_POST['inputprice'];
	$query = "INSERT INTO product (name,price, time) VALUE( '". $inputname."' , ". $inputprice. " , now());";
	
	$rs = mysqli_query($sql, $query);
	
	if (!$rs) {
		echo "등록실패 : " . mysqli_error($sql);
	}
}
function update_product($sql){
	$indexdata = $_POST['indexdata'];
	$updatename = $_POST['updatename'];
	$updateprice = $_POST['updateprice'];
	
	$query = "UPDATE product SET name='" . $updatename . "', price= " . $updateprice . ", time=now() WHERE ind =". $indexdata.";";
	
	$rs = mysqli_query($sql, $query);
	
	if (!$rs) {
		echo "등록실패 : " . mysqli_error($sql);
	}
}

function delete_product($sql){
	$deleteindex = $_POST['deleteindex'];
	$query = "DELETE FROM product WHERE ind =". $deleteindex.";";
	
	$rs = mysqli_query($sql, $query);
	
	if (!$rs) {
		echo "등록실패 : " . mysqli_error($sql);
	}
}

$call_name = $_POST['call_name'];
echo $call_name(connetDB());
?>