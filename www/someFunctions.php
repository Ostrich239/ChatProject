<?php
# Здесь я записал несколько частоиспользуемых функций
# Предполагается include этого файла в пхп-код

session_start();

function sessionMessageSetted () {
  return isset($_SESSION['message']);
}

function showSessionMessage () {
  echo $_SESSION['message'];
  if (sessionMessageSetted()) {
    echo "<br>";
  }
}

function unsetSessionMessage () {
  unset($_SESSION['message']);
}

function standartWorkWithMessage() {
  if (sessionMessageSetted()) {
    showSessionMessage();
    unsetSessionMessage();
  } else {
    echo "no session message <br>";
  }
}


function connectDB () {
  require_once ("connect.php");
}

function getUserByLogin ($login) {
  $login = htmlspecialchars($login);
  return mysql_fetch_assoc(mysql_query("
  SELECT * FROM users WHERE
    login = '$login'
  "));
}

function setSessionMessage ($msg) {
  $_SESSION['message'] = $msg;
}

?>