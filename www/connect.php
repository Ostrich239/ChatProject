<?php
  $user = "root";
  $password = "";
  $db = "project_users";
  mysql_connect("localhost", $user, $password);
  @mysql_query('CREATE DATABASE '.$db);
  mysql_select_db($db);
?>