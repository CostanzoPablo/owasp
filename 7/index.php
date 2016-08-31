<?php
echo '<div style="width:30%;height:200px;">
Missing Function Level Access Control
</div>';
//Missing_Function_Level_Access_Control

//mostrar un login y luego se puede .. "postear algo"
//Mostrar que sin login se puede postear igual
include('../connect.php');

foreach ($_GET as $key => $value) {
	$_GET[$key] = htmlentities(addslashes($_GET[$key]));
}
foreach ($_POST as $key => $value) {
	$_POST[$key] = htmlentities(addslashes($_POST[$key]));
}  

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if (isset($_GET["delete"])){
	$sql2=("DELETE FROM owasp_7_comments WHERE id = '$_GET[delete]'");
	if (!mysql_query($sql2,$con)){
		die("error");
	}
}

if (isset($_POST["comment"])){
	$sql=("INSERT INTO owasp_7_comments (ip, comment) VALUES ('$ip', '$_POST[comment]')");
	if (!mysql_query($sql,$con)){
		die('error');
	}
}

echo '<form method="post" action="./index.php">
	<input type="text" name="comment" placeholder="Comment"><br>
	<input type="submit" value="SEND"><br>
</form>';

$sql=mysql_query("SELECT * FROM owasp_7_comments",$con);
while($row = mysql_fetch_array($sql)){

	echo '<hr>';
	if ($ip == $row["ip"]){
		echo '<a href="./index.php?delete='.$row["id"].'"><font color="#AA0000"><b>X</b></font></a>';
	}
	echo $row["ip"].': '.$row["comment"];
}
?>