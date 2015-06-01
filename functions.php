<?php
include('config.php');

/*FUNCTION FOR FETCHING TOTAL DATA OF A TABLE
FUNCTION NAME getData( 1. FIELD NAME, 2. TABLE NAME )
DATE : 04-10-2014 
*/

function getTotalData($table_name)
{
	$result = mysql_query("SELECT count(*) as totalRecord FROM $table_name ");
	$row = mysql_fetch_object($result);
	return $row->totalRecord;	
}

/*FUNCTION FOR FETCHING DATA FROM DATABASE
FUNCTION NAME getData( 1. FIELD NAME, 2. TABLE NAME, 3. CONDITION, 4. ORDER BY FIELD )
DATE : 04-10-2014 
*/

function getData($field_name, $table_name, $condition = '', $order_by = '', $start=1, $limit=100000)
{
	$sql = "SELECT $field_name FROM $table_name ";
	if(!empty($condition))
		$sql .= " WHERE $condition";
	if(!empty($order_by))
		$sql .= " ORDER BY  $order_by";
	if(!empty($start) || !empty($limit))
	{
		$start = ($start-1) * $limit;
		$sql .= " LIMIT $start, $limit";
	}
	//print $sql;
	$result = mysql_query($sql);
	while ( $row = mysql_fetch_assoc($result) )
		$data[] = $row;
	return $data;	
		
}

/*
FUNCTION FOR CREATING HTML TABLE DYNAMICALLY
FUNCTION NAME generateHTMLTable( 1. FIELD NAME, 2. FIELD LABEL, 3. ALL DATA TO BE PRINTED, 4. TABLE CLASS NAME )
DATE : 05-10-2014 
*/


function generateHTMLTable($table_name, $primary_key, $field_name, $field_label,$total_data, $page_start,$limit, $num_of_link, $result, $class_name, $page_name)
{
 print '<div class="table-responsive">';
	print "<table class=\"$class_name\">";
 
	print '<tr>';
		foreach($field_label as $key=>$val)
	 	{	if($val != '')
				print "<th>".$key."<span><a href='#' onclick=\"set_table_sorting('$val','ASC' ,'$page_name')\" ><img src='./images/arrow_up.png' width=25 height=25></a><a href='#' onclick=\"set_table_sorting('$val','DESC' ,'$page_name')\"><img src='./images/arrow_down.png' width=25 height=25></a></span></th>";
			 else
			    print '<th>'.$key.'</th>';;	
		}
	print '</tr>';

	
	for($i=0;$i<count($result);$i++)
	{
		print '<tr>';
		foreach($field_name as $key=>$val)
		{
			$primary_key_value = $result[$i][$primary_key];
			if($field_name[$key] == '')
				print '<td>'.$result[$i][$key].'</td>';
			else
			{
				if($val == 'delete_record')
					print "<td><a href='#' onclick=\"".$val."('$table_name','$primary_key', '$primary_key_value','$page_name')\">$key</a></td>";
				else if($val == 'modal')
					print "<td><a href=\"ajax/modal/modal_edit_$page_name.php?page_title=Edit-Product-Inventory&primary_key=$primary_key&primary_key_value=$primary_key_value&\" data-target=\"#ajax\" data-toggle=\"modal\">$key</a></td>";	
				else
					print "<td><a href='#' onclick=\"".$val."('$table_name','$primary_key', '$primary_key_value','$page_name')\">$key</a></td>";
			}
			/*if($val == 'edit')
				print "<td><a href='#' onclick=\"".$action['edit']."('$id')\">Edit</a></td>";
			elseif($val == 'delete')
				print "<td><a href='#' onclick=\"".$action['delete']."('$id')\">Delete</a></td>";
			else
				print '<td>'.$result[$i][$val].'</td>';*/
		}
		print '</tr>';
	}
	
 print "</table>";
 
print '</div>'; 
 //************************************************
	//CODE FOR PAGING
	//CODED BY SHIHAN ARAFIN
	//DATE : 09 - 09 -2014
	//************************************************
	print '<div class="col-xs-12" align="center"><ul class="pagination pagination-lg">';
	$start	=	($page_start	-	1)	*	$limit;
	$total_pages	=	ceil($total_data / $limit);
	
	$start_limit	= $page_start - $num_of_link/2;
	if($start_limit <= 0)
		$start_limit = 1;	
	$end_limit	=	$start_limit + $num_of_link;
	if($end_limit > $total_pages)
	{
		$end_limit = $total_pages+1;
		$start_limit	=	$end_limit	-	$num_of_link;
		if($start_limit <= 0)
			$start_limit = 1;
	}
		
	for($i=$start_limit;$i<$end_limit; $i++)
   		print "<li><a href='#' onclick=\"set_table_paging('$i','$page_name')\">".$i."</li>";
	
	print '</ul></div><br><br><br><br>';
	//***********************END OF PAGING *************************
 	
}


?>