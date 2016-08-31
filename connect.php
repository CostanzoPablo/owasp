<?php
$con = mysql_connect("localhost","root", "Wtraaasss77");
if (!$con)
  {
  echo 'Could not connect: ' . mysql_error();
  die();
  }
mysql_select_db('owasp', $con);
?>
