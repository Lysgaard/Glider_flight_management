<?php
error_reporting(E_ALL ^ E_DEPRECATED);
extract($_POST);
include('../config.php');
$sql = "SELECT flightlog_details.*, flightlog.flight_date  FROM flightlog, flightlog_details WHERE flightlog.flight_id = flightlog_details.flight_id ";

if(!empty($start_date) &&  !empty($end_date))
{
	$start_date = date('Y-m-d',strtotime($start_date));
	$end_date = date('Y-m-d',strtotime($end_date));
	
	$sql .= " AND (  flight_date >= '$start_date' AND flight_date <= '$end_date' )  ";	
}


if(!empty($sort_column))
{
	$sql .= " ORDER BY $sort_column $sort_order ";	
}

$result = mysql_query($sql);

print '<div class="col-xs-12" style="font-size:10px" >';

print '<div class="row">';
print '<br><br><br><br><br><br><br>';
print '<form method="post" action="report_pdf1/flight.php">';
print '<div class="col-md-2">Start Date</div>';
print '<div class="col-md-2"><input type="text" class="form-control" name="start_date" id="start_date" ></div>';
print '<div class="col-md-2">End Date</div>';
print '<div class="col-md-2"><input type="text" class="form-control" name="end_date" id="end_date" ></div>';
print '<div class="col-md-2"><input type="button" class="btn btn-primary" onclick=show_public_flight() value="Search" ></div>';
print '<div class="col-md-2"><input type="submit" class="btn btn-primary" value="Generate PDF" ></div>';

print '</form>';
print '</div>';

print '<br><br>';

print '<div class="table-responsive">';
print '<table class="table table-bordered">';

print '<tr class="active">';
				print "<th>Date<span><a href='#' onclick=\"show_public_flight('flight_date','ASC')\" ><img src='./images/arrow_up.png' width=8 height=8></a><a href='#' onclick=\"show_public_flight('flight_date','DESC')\"><img src='./images/arrow_down.png' width=8 height=8></a></span></th>";
				print "<th>Plane<span><a href='#' onclick=\"show_public_flight('plane','ASC')\" ><img src='./images/arrow_up.png' width=8 height=8></a><a href='#' onclick=\"show_public_flight('plane','DESC')\"><img src='./images/arrow_down.png' width=8 height=8></a></span></th>";
				
				
				print "<th>Glider<span><a href='#' onclick=\"show_public_flight('glider','ASC')\" ><img src='./images/arrow_up.png' width=8 height=8></a><a href='#' onclick=\"show_public_flight('glider','DESC')\"><img src='./images/arrow_down.png' width=8 height=8></a></span></th>";
				
				print '<th>Takeoff</th>';
				print '<th>Plane Landing</th>';
				print '<th>Glider Landing</th>';
				print '<th>Plane Time</th>';
				print '<th>Glider Time</th>';
				print '<th>Towplane Max Alt</th>';
				print '<th>Comments</th>';
				
				print '<th>Pilot Name</th>';
				print '<th>Pilot Name</th>';
				print '<th>Launch Method</th>';
				print '<th>Flight Type</th>';
				print '<th>Training Flight</th>';
				print '<th>Guest Start</th>';
				
			print '</tr>';

while($row = mysql_fetch_object($result))
{
	$result_preflight = mysql_query("SELECT * FROM preflight WHERE flight_date = '$row->flight_date' AND takeoff_time = '$row->takeoff' AND landing_time = '$row->glider_landing' AND ( glider = '$row->glider' OR glider = '$row->plane' )  ");
	$row_preflight = mysql_fetch_object($result_preflight);
		
	print '<tr>';
				print '<td>'.$row->flight_date.'</td>';
				print '<td>'.$row->plane.'</td>';
				print '<td>'.$row->glider.'</td>';
				print '<td>'.$row->takeoff.'</td>';
				print '<td>'.$row->plane_landing.'</td>';
				print '<td>'.$row->glider_landing.'</td>';
				print '<td>'.$row->plane_time.'</td>';
				print '<td>'.$row->glider_time.'</td>';
				print '<td>'.$row->towplane_max_alt.'</td>';
				print '<td>'.$row->comments.'</td>';
				if(mysql_num_rows($result_preflight)>0)
				{
					print '<td>'.$row_preflight->pilot_name_seat_1.'</td>';
					print '<td>'.$row_preflight->pilot_name_seat_2.'</td>';
					print '<td>'.$row_preflight->launch_method.'</td>';
					print '<td>'.$row_preflight->flight_type.'</td>';
					print '<td>'.$row_preflight->training_flight.'</td>';
					print '<td>'.$row_preflight->guest_start.'</td>';
				}
				else
				{
					print '<td></td>';
					print '<td></td>';
					print '<td></td>';
					print '<td></td>';
					print '<td></td>';
					print '<td></td>';
				}
			
				
			print '</tr>';	
}

print '</table>';

print '</div>';
print '</div>';
?>