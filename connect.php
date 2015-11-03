<?php
$con = mysql_connect("localhost","owasp","RmJWs78b8GxLsB7S");
if (!$con)
  {
  echo 'Could not connect: ' . mysql_error();
  die();
  }
mysql_select_db('owasp', $con);
?>