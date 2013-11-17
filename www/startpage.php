<?php
  // Добавлять в отчет все PHP ошибки (см. список изменений)
//  error_reporting(E_ALL);
  # Это стартовая страница. Здесть можно
  # логиниться или перейти к регистрации
  # в случае удачного логина отправляет 
  # в home, иначе - на себя же.
  session_start();
  require_once "someFunctions.php";
  
  connectDB();
  
  if (isset($_REQUEST['login'])) {
    $user = getUserByLogin($_REQUEST['login']);
	if (!isset($user['password'])) {
	  # То есть юзера такого нет
	  setSessionMessage("User with this login does not exists");
	} else {
	  if ($_REQUEST['password'] != $user['password']) {
        setSessionMessage("Sorry, that password is wrong for username ".$_REQUEST['login']);
		} else {
        # Всё сошлось
		$_SESSION['login'] = $_REQUEST['login'];
        header ("Location: home.php");
      }
    }
  }
//  showSessionMessage();
//  echo "<br> helloblya <br>";
  require_once "head.php";
  standartWorkWithMessage();
?>
<br>
<form action = "startpage.php" method = post>
  Insert your login here: <input type = "text" name = "login" value = "<?=$_REQUEST['login']?>"> <br>
  Insert you password here: <input type = "text" name = "password" value = "<?=$_REQUEST['password']?>"> <br>
  <input type = "submit" name = "go" value = "Insert">
</form>
------------------ <br>
Or register new account here 
<form action = "register.php" method = post>
  <input type = "submit" name = "go" value = "Register">
</form>

<?php
  require_once "tail.php";
?>
  
  

