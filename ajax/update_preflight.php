<?php
extract($_POST);
include('../config.php');
$sql = "UPDATE preflight SET
`glider` ='$glider', 
`pilot_name_seat_1` = '$pilot_name_seat_1', 
`pilot_name_seat_2` = '$pilot_name_seat_2', 
`launch_method` = '$launch_method', 
`flight_type` =  '$flight_type',  
`training_flight` = '$training_flight', 
`guest_start` = '$guest_start',  
`takeoff_time` = '$takeoff_time', 
`landing_time` = '$landing_time'
WHERE id = '$id' ";

mysql_query($sql);

?>