<?php
session_start();
//Insecure_Direct_Object_References

	//Permite editar por url el ID del cliente, y asi leer carros de compras... 

include('../connect.php');

foreach ($_GET as $key => $value) {
	$_GET[$key] = htmlentities(addslashes($_GET[$key]));
}
foreach ($_POST as $key => $value) {
	$_POST[$key] = htmlentities(addslashes($_POST[$key]));
}  

if (!isset($_SESSION["owasp"][4])){
	$_SESSION["owasp"][4] = false;
}

switch ($_GET["step"]){
	case 1:
		$_SESSION["owasp"][4] = false;
		$sql=mysql_query("SELECT * FROM owasp_4_users WHERE name = '$_POST[name]'",$con);
		while($row = mysql_fetch_array($sql)){
			if ($_POST["pass"] == $row["pass"]){
				$_SESSION["owasp"][4] = $row["id"];
				echo '<font size="2" color="#00AA00">YOUR SALARY: '.$row["salary"].'</font>';
			}
		}

		if ($_SESSION["owasp"][4] == false){
			echo '<div>Name or Password incorrect</div>';
		}
		break;
	case 2:
		$_SESSION["owasp"][4] = false;
		break;
}

if ($_SESSION["owasp"][4] == false){
	echo '<font color="#AA0000"><b>Restricted Access !</b></font>
	<form method="post" action="./index.php?step=1">
		<input type="text" name="name" placeholder="Name">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" value="LOG IN">
	</form>';
	exit();
}else{
	echo '&nbsp;<font color="#00AA00"><b>IDENTIFICATED !</b></font> (<a href="./index.php?step=2">LOG OUT</a>)';	
	if (isset($_GET["newpass"])){
		if ($_POST["pass"] == $_POST["rpass"]){
			if ($_GET["newpass"] == 1){
				echo '<div>Changing administrator account password is not activated</div>';
			}else{
				mysql_query("UPDATE owasp_4_users SET pass = '$_POST[pass]' WHERE id = '$_GET[newpass]'");	
				$sql=mysql_query("SELECT * FROM owasp_4_users WHERE id = '$_GET[newpass]'",$con);
				while($row = mysql_fetch_array($sql)){
					echo 'Password for '.$row["name"].' changed successfully';
				}	
			}
			
		}else{
			echo '<font color="#AA0000">ERROR...</font>';
		}
	}	
}	

echo '<div><b>PANEL DE CONTROL</b></div>
<form method="post" action="./index.php?newpass='.$_SESSION["owasp"][4].'">
	<div>New password: <input type="password" name="pass"></div>
	<div>Repeat new password: <input type="password" name="rpass"></div>
	<div><input type="submit" value="CHANGE"></div>
</form>';
?>