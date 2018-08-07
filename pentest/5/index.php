<?php
echo '<div style="width:30%;height:200px;">
Flag Security Misconfiguration
</div>';
//Security_Misconfiguration

//Default acc.
//Standar /admin and standar passwords

echo '<a href="./index.php?section=home">HOME</a>
<a href="./index.php?section=help">HELP</a>
<br>';

switch ($_GET["section"]) {
	case 'home':
		echo 'Home Section..';
		break;
	case 'home':
		echo 'HELP Section...';
		break;
	case 'admin':
		if (isset($_POST["name"]) AND isset($_POST["pass"]) AND $_POST["name"] == 'admin' AND $_POST["pass"] == '12345678'){
			echo 'FLAG UNLOCKED !';	
			exit();
		}else{
			echo 'Acces Restricted
			<form method="post" action="./index.php?section=admin">
				<input type="text" name="name" placeholder="Name"><br>
				<input type="password" name="pass" placeholder="Password" min="8"><br>
				<input type="submit" value="LOG IN">
			</form>';	
		}
		break;		
	default:
		echo 'Default Section.';
		break;
}
?>