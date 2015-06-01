<?php
extract($_POST);
include('../config.php');
$sql = "INSERT INTO preflight(`glider`, `pilot_name_seat_1`, `pilot_name_seat_2`, `launch_method`, `flight_type`, `training_flight`, `guest_start`, `takeoff_time`, `landing_time`) 
VALUES ('$glider', '$pilot_name_seat_1', '$pilot_name_seat_2', '$launch_method', '$flight_type', '$training_flight', '$guest_start', '$takeoff_time', '$landing_time') ";
mysql_query($sql);

?>