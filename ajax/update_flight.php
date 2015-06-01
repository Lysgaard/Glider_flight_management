<?php
extract($_POST);
include('../config.php');
mysql_query("UPDATE flightlog_details SET
	plane = '$plane',
	glider = '$glider',
	takeoff = '$takeoff',
	plane_landing = '$plane_landing',
	glider_landing = '$glider_landing',
	plane_time = '$plane_time',
	glider_time = '$glider_time',
	towplane_max_alt = '$towplane_max_alt',
	pilot = '$pilot',
	comments = '$comments'
	WHERE id = '$id'
	 ");	

mysql_query($sql);

?>