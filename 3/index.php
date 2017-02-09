<?php
if (!isset($_GET["data"])){
	echo '<div style="width:30%;height:200px;">
	Flag XSS
	</div>';
}
//XSS
	//permitir postear codigo y ese codigo tiene codigo JS que hace que las visitas sean redireccionadas
include('../connect.php');

$_GET = str_replace("'", '', $_GET);
$_POST = str_replace("'", '', $_POST);

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}



if (isset($_POST["comment"])){
	$comment = str_replace('<script', '', $_POST["comment"]);
	$sql=("INSERT INTO owasp_3_comments (comment) VALUES ('$comment')");
	if (!mysql_query($sql,$con)){
		die('error');
	}	
}

if (isset($_GET["vote"])){
	$error = false;
	$sql=mysql_query("SELECT * FROM owasp_3_users WHERE id = '$_GET[vote]' AND ip = '$ip'",$con);
	while($row = mysql_fetch_array($sql)){
		$error = true;
	}
	if ($error != true){
		mysql_query("UPDATE owasp_3_users SET likes = likes+1 WHERE id = '$_GET[vote]'");	
	}else{
		echo '<font color="#AA0000" size="20px">Impossible auto vote</font>';
	}
	
}

if (isset($_POST["name"])){
	$error = false;
	$sql=mysql_query("SELECT * FROM owasp_3_users WHERE ip = '$ip'",$con);
	while($row = mysql_fetch_array($sql)){
		$error = true;
	}
	if ($error == true){
		echo '<font color="#AA0000" size="20px">Already registered an account</font>';	
	}else{
		$sql=("INSERT INTO owasp_3_users (name, ip) VALUES ('$_POST[name]', '$ip')");
		if (!mysql_query($sql,$con)){
			die('error');
		}			
	}
}

if (isset($_POST["comments"])){	
	$sql=("INSERT INTO owasp_3_comments (comments) VALUES ($_POST[comments])");
	if (!mysql_query($sql,$con)){
		die('error');
	}	
}






if (isset($_GET["data"])){
	$rows = array();
	$table = array();
	$table['cols'] = array(
	    array('label' => 'Name', 'type' => 'string'),
	    array('label' => 'Likes', 'type' => 'number')
	);

	$rows = array();

	$sql=mysql_query("SELECT * FROM owasp_3_users ORDER by likes DESC",$con);
	while($row = mysql_fetch_array($sql)){
	    $temp = array();
	    $temp[] = array('v' => (string) $row['name']); 
	    $temp[] = array('v' => (int) $row['likes']); 
	    $rows[] = array('c' => $temp);
	}

	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;
	exit();
}


echo '<form method="post" action="./index.php">
	<input type="text" name="name" placeholder="Your Name">
	<input type="submit" value="ADD">
</form>';



echo '<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<div id="chart_div"> </div>';


echo '<script>


google.load(\'visualization\', \'1\', {packages: [\'corechart\', \'bar\']});
google.setOnLoadCallback(drawBasic);

function drawBasic() {

	var datos = $.ajax({
		url:"./index.php?data=true",
		type:"post",
		dataType:"json",
		async:false    		
	}).responseText;


      var data = new google.visualization.DataTable(JSON.parse(datos));

      var options = {
        title: \'Votes\',
        chartArea: {width: \'50%\'},
        hAxis: {
          title: \'Total Votes\',
          minValue: 0
        },
        vAxis: {
          title: \'City\'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById(\'chart_div\'));

      chart.draw(data, options);
    }



</script>';

echo 'Send Vote for...';
$sql=mysql_query("SELECT * FROM owasp_3_users",$con);
while($row = mysql_fetch_array($sql)){
	echo '<hr>
	<a href="./index.php?vote='.$row["id"].'">'.$row["name"].'</a>';
}

echo '<br><br>Send new comment:
<form method="post" action="./index.php">
	<input type="text" name="comment" value="" placeholder="Your comments...">
	<input type="submit" value="SEND">
</form>';

echo '<br><br>Comments:';
$sql=mysql_query("SELECT * FROM owasp_3_comments",$con);
while($row = mysql_fetch_array($sql)){
	echo '<hr>
	'.$row["comment"];
}

?>