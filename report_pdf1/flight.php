<?php
header('Content-Type: application/pdf');
require('fpdf.php');

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
	$sql .= " ORDER BY flight_date ASC ";	
}

$pdf = new FPDF( 'L', 'mm', 'A4' );
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell( 280, 6, "Flight Information", 0, 1, 'C' );


$pdf->SetFont( 'Arial', '', 8 );
$pdf->Cell( 16, 12, "Date", 1, 0, 'L', 0 );
$pdf->Cell( 15, 12, "Plane", 1, 0, 'L', 0 );
$pdf->Cell( 15, 12, "Glider", 1, 0, 'L', 0 );
$pdf->Cell( 15, 12, "Takeoff ", 1, 0, 'L', 0 );
$pdf->Cell( 20, 12, "Plane Landing", 1, 0, 'L', 0 );

$pdf->Cell( 20, 12, "Glider Landing", 1, 0, 'L', 0 );
$pdf->Cell( 16, 12, "Plane Time", 1, 0, 'L', 0 );
$pdf->Cell( 16, 12, "Glider Time", 1, 0, 'L', 0 );
$pdf->Cell( 25, 12, "Towplane", 1, 0, 'L', 0 );
$pdf->Cell( 25, 12, "Comments", 1, 0, 'L', 0 );
$pdf->Cell( 25, 12, "Pilot Name 1", 1, 0, 'L', 0 );
$pdf->Cell( 25, 12, "Pilot Name 2", 1, 0, 'L', 0 );
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->MultiCell( 15, 6, "Launch Method",1,'L',0);
$pdf->SetXY($x+15,$y);
$pdf->Cell( 15, 12, "Flight Type", 1, 0, 'L', 0 );
$pdf->SetXY($x+30,$y);
$pdf->MultiCell( 13, 6, "Training Flight",1,'L',0);
$pdf->SetXY($x+43,$y);
$pdf->Cell( 10, 12, "Guest", 1, 1, 'L', 0 );

$border = 1;
$result = mysql_query($sql);
while($row = mysql_fetch_object($result))
{
	$result_preflight = mysql_query("SELECT * FROM preflight WHERE flight_date = '$row->flight_date' AND takeoff_time = '$row->takeoff' AND landing_time = '$row->glider_landing' AND ( glider = '$row->glider' OR glider = '$row->plane' )  ");
	$row_preflight = mysql_fetch_object($result_preflight);


	$pdf->Cell( 16, 6, $row->flight_date, $border, 0, 'L');
	$pdf->Cell( 15, 6, $row->plane, $border, 0, 'L' );
	$pdf->Cell( 15, 6, $row->glider, $border, 0, 'L' );
	$pdf->Cell( 15, 6, $row->takeoff, $border, 0, 'L' );
	$pdf->Cell( 20, 6, $row->plane_landing, $border, 0, 'L' );
	$pdf->Cell( 20, 6, $row->glider_landing, $border, 0, 'L' );
	$pdf->Cell( 16, 6, $row->plane_time, $border, 0, 'L' );
	$pdf->Cell( 16, 6, $row->glider_time, $border, 0, 'L' );
	$pdf->Cell( 25, 6, $row->towplane_max_alt, $border, 0, 'L' );
	$pdf->Cell( 25, 6, $row->comments, $border, 0, 'L' );
	
	
	if(mysql_num_rows($result_preflight)>0)
	{
		$pdf->Cell( 25, 6, $row->pilot_name_seat_1, $border, 0, 'L' );
		$pdf->Cell( 25, 6, $row->pilot_name_seat_2, $border, 0, 'L' );
		
		$pdf->Cell( 15, 6, $row->launch_method, $border, 0, 'L' );
		$pdf->Cell( 15, 6, $row->flight_type, $border, 0, 'L' );
		$pdf->Cell( 13, 6, $row->training_flight, $border, 0, 'L' );
		$pdf->Cell( 10, 6, $row->guest_start, $border, 1, 'L' );	
	}
	else
	{
		$pdf->Cell( 25, 6, '', $border, 0, 'L' );
		$pdf->Cell( 25, 6, '', $border, 0, 'L' );
		
		$pdf->Cell( 15, 6, '', $border, 0, 'L' );
		$pdf->Cell( 15, 6, '', $border, 0, 'L' );
		$pdf->Cell( 13, 6, '', $border, 0, 'L' );
		$pdf->Cell( 10, 6, '', $border, 1, 'L' );	
	}
}

$pdf->Output( "flight.pdf", "I" );
?>