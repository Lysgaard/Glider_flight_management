<?php
error_reporting(E_ALL ^ E_DEPRECATED);
extract($_POST);
include('../config.php');
$sql = "SELECT *  FROM preflight ";

$result = mysql_query($sql);

print "<input type=\"button\" class=\"btn btn-primary\" value=\"Add Pre Flight\" data-target=\"#preflight\" data-toggle=\"modal\" >";
print '<br><br>';
print '<div class="col-xs-10" >';
print '<div class="table-responsive">';
print '<table class="table table-bordered">';

print '<tr class="active">';
	print '<th>Glider</th>';
	print '<th>Pilot Name</th>';
	print '<th>Pilot Name</th>';
	print '<th>Launch Method</th>';
	print '<th>Flight Type</th>';
	print '<th>Training Flight</th>';
	print '<th>Gues Start</th>';
	print '<th>Edit</th>';
	print '<th>Delete</th>';
	print '<th></th>';		
print '</tr>';

while($row = mysql_fetch_object($result))
{
		
	print '<tr>';
		print '<td>'.$row->glider.'</td>';
		print '<td>'.$row->pilot_name_seat_1.'</td>';
		print '<td>'.$row->pilot_name_seat_2.'</td>';
		print '<td>'.$row->launch_method.'</td>';
		print '<td>'.$row->flight_type.'</td>';
		print '<td>'.$row->training_flight.'</td>';
		print '<td>'.$row->guest_start.'</td>';
		print "<td><a href=\"ajax/modal_edit_preflight.php?id=$row->id\" data-target=\"#ajax\" data-toggle=\"modal\">Edit</a></td>";
		print "<td><a href='#' onclick=\"delete_preflight('$row->id')\" >Delete</a></td>";
		if($row->flight_date != "" && $row->takeoff_time != "" && $row->landing_time !="")
			print '<td>Alrady Linked</td>';
		else
			print "<td><a href=\"#\" onclick=\"modal_link_flight('$row->glider','$row->id')\" >Link to Flight</a></td>";
		
	print '</tr>';	
}

print '</table>';

print '</div>';
print '</div>';
?>