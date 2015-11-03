<?php
//Cross-Site_Request_Forgery_(CSRF)

//http://example.com/app/transferFunds?amount=1500&destinationAccount=4673243243 
//<img src="http://example.com/app/transferFunds?amount=1500&destinationAccount=attackersAcct#" width="0" height="0" /> 

//Como solucionarlo ?

//token !

//OJO MD5 BUG!

include('../connect.php');

echo md5('secret'.$_GET["id"].$_GET["price"]);

echo $_GET["price"];
?>
