<?php
// echo "Hello World";
// $a = 1;
// $b = 2;
// echo $a + $b;


$array = array('name' => '홍길동', 'value' => 20);
extract($array);

var_dump($name . " : " . $value);