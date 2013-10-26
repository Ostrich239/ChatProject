<?php
  session_start();
  if ($_REQUEST['find']{
    header ("location: ");
  }
?>
<form action="edit_personal.php" method=post>
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
