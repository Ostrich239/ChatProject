<?php
  include_once "connect.php";
  mysql_query("
    DROP TABLE IF EXISTS users
  ");
  mysql_query("
    DROP TABLE IF EXISTS users_personals
  ");
  mysql_query("
    DROP TABLE IF EXISTS rooms
  ");
  mysql_query("
    DROP TABLE IF EXISTS room_type
  ");
?>