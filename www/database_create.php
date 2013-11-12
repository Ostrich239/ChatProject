<?php
  include_once "connect.php";
  mysql_query ("
    CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login TEXT,
    password TEXT
	)
  ");
  mysql_query ("
    CREATE TABLE IF NOT EXISTS users_personals (
	id INT,
	login TEXT,
	status TEXT,
	personal_info TEXT
	)
  ");
  mysql_query ("
	CREATE TABLE IF NOT EXISTS users_personals (
	id INT,
	login TEXT,
	status TEXT,
	personal_info TEXT
	)
  ");
  mysql_query ("
	CREATE TABLE IF NOT EXISTS rooms (
	id INT AUTO_INCREMENT PRIMARY KEY,
	type INT,
	name TEXT
	)
  ");
  mysql_query ("
	CREATE TABLE IF NOT EXISTS room_type (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name TEXT,
	description TEXT
	)
  ");
?>