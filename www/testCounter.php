<?php
  require_once "head.php";
  session_start();
  if (isset($_SESSION['counter'])) {
    $_SESSION['counter'] = $_SESSION['counter'] + 1;
  } else {
    $_SESSION['counter'] = 0;
  }
?>
<form action = "testCounter.php" method = post>
  <input type = "submit" name = "refresh" value = "go">
</form>
Текущий счетчик: <?=$_SESSION['counter']?>
<?php
  require_once "tail.php";
?>  