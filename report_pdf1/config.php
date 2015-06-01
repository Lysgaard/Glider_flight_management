<?php 


$host = "localhost";

$mysql_user = "n563041_demo";

$mysql_password = "";

$mysql_db = "flarm";






//make connection with mysql and select the database

$link = mysqli_connect($host, $mysql_user, $mysql_password,$mysql_db) ;

if(!$link) {echo ("<P>Connection issues. No results displayed.</P>");}



/*$db_select = mysql_select_db($mysql_db);

if(!$db_select) {echo ("<P>Connection issues. No results displayed.</P>");}

*/?>

