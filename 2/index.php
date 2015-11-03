<?php
//Broken_Authentication
	//url editing session_id
include('../connect.php');

foreach ($_GET as $key => $value) {
	$_GET[$key] = htmlentities(addslashes($_GET[$key]));
}
foreach ($_POST as $key => $value) {
	$_POST[$key] = htmlentities(addslashes($_POST[$key]));
}  


if (isset($_POST["name"])){
	$error = true;
	$sql=mysql_query("SELECT * FROM owasp_2_users WHERE name = '$_POST[name]'",$con);
	while($row = mysql_fetch_array($sql)){
		if ($_POST["pass"] == $row["pass"]){
			$error = false;
			echo '<a href="./index.php?sessionid='.$row["id"].'">CONTINUE</a>';
			exit();
		}
	}

	if ($error == true){
		echo '<div>Name or Password incorrect</div>';
	}
}


if (isset($_GET["sessionid"])){
	$sql=mysql_query("SELECT * FROM owasp_2_users WHERE id = '$_GET[sessionid]'",$con);
	while($row = mysql_fetch_array($sql)){
		echo 'YOU ARE: '.$row["name"];
	}
}else{
	echo '<form method="post" action="./index.php">
		<input type="text" name="name" placeholder="Name">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" value="LOG IN">
	</form>';
}
?>

