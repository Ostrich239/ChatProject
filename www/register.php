<?php
  if ($_REQUEST['register']){
    if ($_REQUEST['password']!=$_REQUEST['password_repeated']){
	  echo "Passwords must be similar. Please, repeat.";
	}
	else {
	  require_once "connect.php";
	  mysql_query (
	    'CREATE TABLE IF NOT EXISTS users (
	    login TEXT,
	    password TEXT
	    )'
	  );
	  $login = $_REQUEST['login'];
	  $password = $_REQUEST['password'];
	  $res = mysql_query (
	    'SELECT * FROM users WHERE login=\''.mysql_escape_string($login).'\''
	  );
	  if (mysql_fetch_array($res, MYSQL_ASSOC)){
	    echo "User with this login exists. Please, choose another login.";
	  }
	  else {
	    mysql_query (
		  'INSERT INTO users SET login=\''.mysql_escape_string($login).'\', password=\''.mysql_escape_string($password).'\''
		);
		session_start();
		echo $login.", you was successfully registred.";
	  }
	}
  }
?>
Insert your login and password:</br>
<form action="register.php" method=post>
  <table>
    <tr>
	  <td>Your login:</td>
	  <td><input type="text" name="login"></td>
	</tr>
	<tr>
	  <td>Your password:</td>
	  <td><input type="text" name="password"></td>
	</tr>
	<tr>
	  <td>Repeat your password:</td>
	  <td><input type="text" name="password_repeated"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="register" value="add"></td>
	</tr>	
  </table>
</form>
<a href = "login.php">Enter to site</a>
