<?php
$mysql = new mysqli('localhost', 'root', 'cmskorea', 'test');

$query = "SELECT * FROM sample";
$rs = mysqli_query($mysql, $query);
$rows = mysqli_fetch_all($rs);

echo "<pre>";
var_dump($rows);
echo "</pre>";
$result = array(            'result'    => false,
        'message'   => '',
        'leaveRow'  => null);
$result2 = array();

var_dump($result);
$result2 = $result;
var_dump($result2);
if ($result == $result2) {
    echo '확인';
}

