<?php
//Sensitive_Data_Exposure

//Ejemplos... Algun sitio... Luego Twitter encriptado pero simple y ahora Fibertel

//Explicar que no basta con MD5, usar un salt. Ese salt si lo sacan porque llegaron al codigo, van a tardarse
//pero con los servidores Cluster de Amazon, pueden hacerlo por 50 dolares.
//Solucion ? Aplicar un salt diferente para cada usuario....
//Aplicar MD5 varias veces (pero en diferentes cantidades)

include('../connect.php');

foreach ($_GET as $key => $value) {
	$_GET[$key] = htmlentities(addslashes($_GET[$key]));
}
foreach ($_POST as $key => $value) {
	$_POST[$key] = htmlentities(addslashes($_POST[$key]));
}  


if (isset($_POST["name"])){
	$error = true;
	$sql=mysql_query("SELECT * FROM owasp_6_users WHERE name = '$_POST[name]'",$con);
	while($row = mysql_fetch_array($sql)){
		if (md5($_POST["pass"]) == $row["pass"]){
			$error = false;
			echo '<a href="./index.php?sessionid='.$row["id"].'&get=name">CONTINUE</a>';
			exit();
		}
	}

	if ($error == true){
		echo '<div>Name or Password incorrect</div>';
	}
}


if (isset($_GET["sessionid"])){
	$sql=mysql_query("SELECT * FROM owasp_6_users WHERE id = '$_GET[sessionid]'",$con);
	while($row = mysql_fetch_array($sql)){
		echo 'YOU ARE: '.$row[$_GET["get"]];
	}
}else{
	echo '<form method="post" action="./index.php">
		<input type="text" name="name" placeholder="Name">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" value="LOG IN">
	</form>';
}
?>
