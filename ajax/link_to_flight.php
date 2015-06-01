<?php
extract($_POST);
include('../config.php');

$result = mysql_query("SELECT * FROM flightlog_details WHERE id = '$id' ");
$row = mysql_fetch_object($result);
$takeoff = $row->takeoff;
$glider_landing = $row->glider_landing;
$flight_id = $row->flight_id;

$result = mysql_query("SELECT * FROM flightlog WHERE flight_id = '$flight_id' ");
$row = mysql_fetch_object($result);

$flight_date = $row->flight_date;

mysql_query(" UPDATE preflight SET flight_date = '$flight_date', 
takeoff_time = '$takeoff',
landing_time = '$glider_landing'
WHERE id = '$pid'
");

?>