<?php
$con = mysql_connect("localhost","owasp");
if (!$con)
  {
  echo 'Could not connect: ' . mysql_error();
  die();
  }
mysql_select_db('owasp', $con);
?>
