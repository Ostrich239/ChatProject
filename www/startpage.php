<?php

  # Это стартовая страница. Здесть можно
  # логиниться или перейти к регистрации
  # в случае удачного логина отправляет 
  # в home, иначе - на себя же.
  
  session_start();
  require_once "someFunctions.php";
  require_once "head.php";
  
  standartWorkWithMessage();
  
  connectDB();
  
  if (isset($_REQUEST['login'])) {
    $user = getUserByLogin($_REQUEST['login']);
	if (!isset($user['password'])) {
	  # То есть юзера такого нет
	  setSessionMessage("User with this login does not exists");
	  header ("Location: home.php");
	} else {
	  if ($_REQUEST['password'] != $user['password']) {
        setSessionMessage("Sorry, that password if wrong for username ".$_REQUEST['login']);
		header ("Location: home.php");
      } else {
        # Всё сошлось
		$_SESSION['login'] = $_REQUEST['login'];
        header ("Location: home.php");
      }
    }
  }
  
?>
<form action = "startpage.php" method = post>
  Insert your login here: <input type = "text" name = "login" value = <?=$_REQUEST['login']?>>
  Insert you password here: <input type = "text" name = "password" value = <?=$_REQUEST['password']?>>
  <input type = "submit" name = "go" value = "Insert">
</form>
------------------
Or register new account here 
<form action = "register.php" method = post>
  <input type = "submit" name = "go" value = "Register">
</form>
  
  

