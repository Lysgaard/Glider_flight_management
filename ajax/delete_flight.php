<?php
extract($_POST);
include('../config.php');
$result = mysql_query("SELECT * FROM flightlog_details WHERE id = '$id' ");	
$row = mysql_fetch_object($result);
mysql_query("DELETE FROM flightlog_details WHERE id = '$id' ");
$flight_id = $row->flight_id;

$result = mysql_query("SELECT * FROM flightlog_details WHERE flight_id = '$flight_id' ");	
if(mysql_num_rows($result) == 0 )
{
	mysql_query("DELETE FROM flightlog WHERE flight_id = '$flight_id' ");
}

?>