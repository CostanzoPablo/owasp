<?php
echo '<div style="width:30%;height:200px;">
Unvalidated Redirects and Forwards
</div>';
//Unvalidated Redirects and Forwards
//www.banco.com/index.php?url=247.147.152.8/evil.html


if (isset($_GET["ayuda"])){
	echo urlencode('<iframe src="http://www.unlp.edu.ar" width="100%" height="100%" border="0" frameborder="0" style="top: 0px;position: absolute;left: 0px;"></iframe>');
}

if (isset($_GET["logout"])){
	echo 'Hasta la proxima '.$_GET["logout"].'!';
}else{
	echo '<br><a href="./index.php?logout=Juan">LOGOUT</a>';
}

?>