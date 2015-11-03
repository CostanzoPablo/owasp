<?php
	include('./connect.php');

	if (isset($_GET["reset"])){
		if (mysql_query("SOURCE owasp.sql")) {
			echo "Hello Sonny";
		} 
	}

	echo '<ul>';
	for($i=1;$i<=10;$i++){
		echo '<li><a href="./1">1</a></li>';
	}
	echo '</ul>';	
?>
