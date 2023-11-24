<?php
$mysql = new mysqli('localhost', 'root', 'cmskorea', 'test');

$query = "SELECT * FROM sample";
$rs = mysqli_query($mysql, $query);
$rows = mysqli_fetch_all($rs);

echo "<pre>";
var_dump($rows);
echo "</pre>";