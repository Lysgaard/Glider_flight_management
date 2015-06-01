<?php
extract($_POST);
include('../config.php');
$flight_date = date('Y-m-d',strtotime($flight_date));
mysql_query(" INSERT INTO flightlog (flight_date) VALUES ('$flight_date') ");
$flight_id = mysql_insert_id();

mysql_query("INSERT INTO flightlog_details (flight_id, plane, glider, takeoff, plane_landing, glider_landing, plane_time, glider_time, towplane_max_alt, comments) VALUES 
('$flight_id', '$plane', '$glider', '$takeoff', '$plane_landing', '$glider_landing', '$plane_time', '$glider_time', '$towplane_max_alt', '$comments') ");
?>