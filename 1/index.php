<?php
session_start();

echo '<div style="width:30%;height:200px;">
Flag 1 SQL Injection
<br>
Flag 2 OS Commanding
</div>';
//SQL Injection
//OS Commanding
include('../connect.php');

if (!isset($_SESSION["owasp"][1])){
	$_SESSION["owasp"][1] = false;
}

switch ($_GET["step"]) {
	case 1:
		$_SESSION["owasp"][1] = false;
		$sql=mysql_query("SELECT * FROM owasp_1_users WHERE name = '$_POST[name]' AND pass = '$_POST[pass]'",$con);
		while($row = mysql_fetch_array($sql)){
			$_SESSION["owasp"][1] = true;
		}

		if ($_SESSION["owasp"][1] == false){
			echo '<div>Name or Password incorrect</div>';
		}
		break;
	case 2:
		$_SESSION["owasp"][1] = false;
		break;
}

if ($_SESSION["owasp"][1] == false){
	echo '<font color="#AA0000"><b>Restricted Access !</b></font>
	<form method="post" action="./index.php?step=1">
		<input type="text" name="name" placeholder="Name">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" value="LOG IN">
	</form>';
	exit();
}else{
	echo '<font color="#00AA00"><b>IDENTIFICATED ! (Flag 1 of 2 OK)</b></font> (<a href="./index.php?step=2">LOG OUT</a>)';	
}	

echo '<form method="post" action="./index.php">
	<input type="hidden" value="./documents" name="documents">
	<input type="submit" value="LISTAR DOCUMENTOS">
</form>';

if (isset($_POST["documents"])){
	$command = shell_exec('ls '.$_POST["documents"]);
	$files = preg_split('/[\r\n]+/', $command);
	$i = 0;
	foreach ($files as $key => $value) {
		echo '<div><a href="./documents/'.$value.'" target="_blank">'.$value.'</a></div>';
	}
}
?>