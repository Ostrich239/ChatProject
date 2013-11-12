<?php
  session_start();
  require_once "head.php";
?>
Hello, <?echo $_SESSION['login'];?>! What would you like to do?</br>
<li><a href="users.php">Find another user</a></li>
<li><a href="edit_personal.php">Edit personal settings</a></li>
<li><a href="rooms.php">Edit rooms</a></li>
<li><a href="logout.php">Logout</a></li>
<?require_once "tail.php"?>  