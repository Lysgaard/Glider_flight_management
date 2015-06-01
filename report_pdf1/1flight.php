<?php
//ALL SUBMITTED DATA FROM CALCULATOR
	
header('Content-type: application/pdf');
		
//	echo $_POST["email"] . "<br>";
	require('fpdf.php');
	require('PEAR.php');
	class PDF extends FPDF
	{
		var $B;
		var $I;
		var $U;
		var $HREF;
		function PDF($orientation='P',$unit='mm',$format='A4')
		{
			//Call parent constructor
			$this->FPDF($orientation,$unit,$format);
			//Initialization
			$this->B=0;
			$this->I=0;
			$this->U=0;
			$this->HREF='';
		}

		function PutLink($URL,$txt)
		{
			//Put a hyperlink
			$this->SetTextColor(0,0,255);
			$this->SetStyle('U',true);
			$this->Write(5,$txt,$URL);
			$this->SetStyle('U',false);
			$this->SetTextColor(0);
		}
		
		function OpenTag($tag,$attr)
		{
			//Opening tag
			if($tag=='B' or $tag=='I' or $tag=='U')
				$this->SetStyle($tag,true);
			if($tag=='A')
				$this->HREF=$attr['HREF'];
			if($tag=='BR')
				$this->Ln(5);
		}
		
		function CloseTag($tag)
		{
			//Closing tag
			if($tag=='B' or $tag=='I' or $tag=='U')
				$this->SetStyle($tag,false);
			if($tag=='A')
				$this->HREF='';
		}
		
		function SetStyle($tag,$enable)
		{
			//Modify style and select corresponding font
			$this->$tag+=($enable ? 1 : -1);
			$style='';
			foreach(array('B','I','U') as $s)
				if($this->$s>0)
					$style.=$s;
			$this->SetFont('',$style);
		}
		
		function WriteHTML($html)
		{
			//HTML parser
			$html=str_replace("\n",' ',$html);
			$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
			foreach($a as $i=>$e)
			{
				if($i%2==0)
				{
					//Text
					if($this->HREF)
						$this->PutLink($this->HREF,$e);
					else
						$this->Write(5,$e);
				}
				else
				{
					//Tag
					if($e{0}=='/')
						$this->CloseTag(strtoupper(substr($e,1)));
					else
					{
						//Extract attributes
						$a2=explode(' ',$e);
						$tag=strtoupper(array_shift($a2));
						$attr=array();
						foreach($a2 as $v)
							if(ereg('^([^=]*)=["\']?([^"\']*)["\']?$',$v,$a3))
								$attr[strtoupper($a3[1])]=$a3[2];
						$this->OpenTag($tag,$attr);
					}
				}
			}
		}
	//Page header
		function Header()
		{
    		
			//Logo
	    		//$this->Image('logo2.jpeg',90,40,33);
    			//Arial bold 15
		    	$this->SetFontSize(10);
				//Move to the right
			$this->Cell(80);
		      //Title
    			//$this->Cell(50,50,$this->getContent(),0,0,'C');
    			//Line break
	    		//$this->Ln(20);
		}

//Page footer
		function Footer()
		{
    		//Position at 1.5 cm from bottom
   			//$this->TextColor = 'black';
			$this->SetY(-15);
			//Arial italic 8
    		//Page number
    		//$this->Cell(0,10,'You may not duplicate, reproduce, distribute or link to any portion of this site without written permission.',0,0,'C');

		}

}

	

///////////////////////////////////pdf code start///////////////////////

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
	$sql .= " ORDER BY flight_date ASC ";	
}


/**
  Create the title page
**/
//$pdf=new PDF();
$pdf = new FPDF( 'L', 'mm', 'A4' );
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont( 'Arial', 'B', 12 );

/*######################################
CODE FOR GENERATING ATTENDANCE RECORD 
FOR MULTIPLE WORKER BT CRITERIA
DATE - 18/03/2015
#######################################*/
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









 
	
/***
  Serve the PDF
***/
$pdf->Output( "flight.pdf", "D" );
//$pdf->Output();
$pdf->Close();
//$pdf->Output( "report.pdf", "I" );
//$var->output();

///////////////pdf code end////////////////////////////////////////////////////

?>
