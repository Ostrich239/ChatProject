<?php
  session_start();
  
?>
<?include_once "head.php"?>													// Не забыть эту строчку продублировать или перенести наверх туда, где будет начинаться вывод
<form action="users.php" method=post>
  <table>
    <tr>
	  <td>Whom would you like to find</td>
	  <td><input type="text" name="login"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="find" value="Find"></td>
	</tr>	
  </table>
</form>
<a href = "home.php">To home page</a>
<?include_once "tail.php"?>