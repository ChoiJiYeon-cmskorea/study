<?php

  $group = $_GET['group'];

  $users = array();

  $query = 'select * from userlist where group_name="'.$_group.'" order by user_name';

  $result = $pdo->query($query);

  foreach($result as $list){

    array_push($users, array('user' => $list['user_name']));

  }

  $output = json_encode($users, JSON_UNESCAPED_UNICODE);

  print_r($output);

?>