<?php
	include('./connect.php');

	echo '<ul>';
	for($i=1;$i<=10;$i++){
		echo '<li><a href="./'.$i.'">'.$i.'</a></li>';
	}
	echo '</ul>';	
?>
