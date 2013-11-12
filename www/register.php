<?php
  session_start();
  if (isset($_SESSION['message'])){
    require_once "head.php";
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
  else {
  if ($_REQUEST['register']){
    if ($_REQUEST['password'] != $_REQUEST['password_repeated']){
	  $_SESSION['message'] = "Passwords must be similar. Please, repeat.</br>";
	  header ("location: register.php");
	}
	else {
	    require_once "connect.php";
	    $login = mysql_escape_string($_REQUEST['login']);
	    $password = mysql_escape_string($_REQUEST['password']);
	    $res = mysql_query (
	      "SELECT * FROM users WHERE 
		  login='$login'"
	    );
	    if (mysql_fetch_array($res, MYSQL_ASSOC)){
	      $_SESSION['message'] = "User with this login exists. Please, choose another login.</br>";
	      header ("location: register.php");
		}
	    else {
	      mysql_query (
		    "INSERT INTO users SET 
		    login='$login', password='$password'"
		  );
		  $id = mysql_insert_id();
		  mysql_query ("
		    INSERT INTO users_personals SET
		    id='$id', login='$login', status='unspecialized', personal_info='empty'
		  ");
		  $_SESSION['message'] = $login.", you was successfully registred.</br>";
	      header ("location: register.php");
		}
	  }
    }
  }
?>
<?require_once "head.php"?>
Insert your login and password:</br>
<form action="register.php" method="POST">
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
<?require_once "tail.php"?>