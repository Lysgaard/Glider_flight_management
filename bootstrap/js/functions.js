var column_name;
var order_name;
var paging=1;

	function set_table_sorting(sort_column, sort_order, page_name )
	{
		column_name = sort_column;
		order_name = sort_order;
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/view/"+page_name+".php",
				data: {sort_column:column_name, sort_order:order_name, page_start:paging},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
				}
			});
	}
	
	function set_table_paging(page_start,page_name)
	{
		paging = page_start;
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/view/"+page_name+".php",
				data: {sort_column:column_name, sort_order:order_name, page_start:paging},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
				}
			});
	
	}
	/*
	FUNCTION FOR VIEWING GENERALIZED TABLE
	*/
	function view_table_data(page_name, sort_column, sort_order,page_start)
	{
		column_name = sort_column;
		order_name = sort_order;
		if(page_start != '')
			paging = page_start;
		else
			paging = 1;
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/view/"+page_name+".php",
				data: {sort_column:column_name, sort_order:order_name, page_start:paging},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
				}
			});
		
	}
	
	/*
	FUNCTION FOR INPUTING ONLY NUMBER IN TEXTBOX
	*/
	function isNumber(evt)
 	{
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57) 
		  && (charCode < 96 || charCode > 105))
             return false;

          return true;
     }
	 /*
	FUNCTION FOR INPUTING ONLY PRICE IN TEXTBOX
	*/
	 function isPrice(evt)
     {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
		  if ( charCode != 110 && charCode != 190 && charCode != 46 && charCode > 31 
		  && (charCode < 48 || charCode > 57) && (charCode < 96 || charCode > 105) )
             return false;

          return true;
     }	
	
function delete_record(table_name, primary_key, primary_key_value, page_name)
{
	bootbox.confirm("Are you sure to approve the selected Record?", function(result)
		{
			if(result) 
			{
				$("#loading").modal('show');
				$.ajax({
						type: "POST",
						url: "./ajax/delete/delete_record.php",
						data: {table_name:table_name, primary_key:primary_key, primary_key_value:primary_key_value},
						success: function( msg ) {
						//$('a[href="#allOrder"]').tab('show');
						//$("#loading").modal('hide');
						
						view_table_data(page_name,column_name,order_name,paging);
						}
					});
			}
		}); 				
}

function search_flight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/show_flight.php",
				data: {sort_column:column_name, sort_order:order_name, start_date:$('#start_date').val() , end_date:$('#end_date').val()},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
					
					$('#start_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
					
					$('#end_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
				}
			});
}

function show_public_flight(sort_column, sort_order)
{
		column_name = sort_column;
		order_name = sort_order;
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/show_public_flight.php",
				data: {sort_column:column_name, sort_order:order_name},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
					
					$('#start_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
					
					$('#end_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
				}
			});
}

function show_flight(sort_column, sort_order)
{
		column_name = sort_column;
		order_name = sort_order;
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/show_flight.php",
				data: {sort_column:column_name, sort_order:order_name},
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
					
					$('#start_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
					
					$('#end_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
				}
			});
}

function show_preflight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/show_preflight.php",
				success: function( msg ) {
					//$('a[href="#allOrder"]').tab('show');
					$("#loading").modal('hide');
					$('#div_main_content').html(msg);
				}
			});
}

function add_new_preflight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/add_new_preflight.php",
				data:$('.addPreFlight').serialize(),
				success: function( msg ) {
					show_preflight();
					$('#preflight').modal('hide');
					$('#preflight').removeData('bs.modal');
				}
			});
}

function update_preflight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/update_preflight.php",
				data:$('.editPreFlight').serialize(),
				success: function( msg ) {
					show_preflight();
					$('#ajax').modal('hide');
					$('#ajax').removeData('bs.modal');
				}
			});
}

function update_flight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/update_flight.php",
				data:$('.editFlight').serialize(),
				success: function( msg ) {
					show_flight('flight_date','ASC');
					$('#ajax').modal('hide');
					$('#ajax').removeData('bs.modal');
				}
			});
}

function modal_add_new_flight()
{
	$.ajax({
				type: "POST",
				url: "./ajax/modal_add_new_flight.php"
				})
			.done(function( msg ) {
				$('#dynamic_modal').html(msg);
				$('#dynamic_modal').modal('show');
				$('#flight_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
			});
}

function add_new_flight()
{
		$("#loading").modal('show');
		$.ajax({
				type: "POST",
				url: "./ajax/add_new_flight.php",
				data:$('.addFlight').serialize(),
				success: function( msg ) {
					show_flight('flight_date','ASC');
					$('#dynamic_modal').modal('hide');
					$('#dynamic_modal').removeData('bs.modal');
				}
			});
}

function modal_link_flight(glider, id)
{
	$.ajax({
				type: "POST",
				url: "./ajax/modal_link_flight.php",
				data:{glider:glider, id:id}
				})
			.done(function( msg ) {
				$('#dynamic_modal').html(msg);
				$('#dynamic_modal').modal('show');
				$('#flight_date').datepicker({ 
						format:'mm/dd/yyyy',
						orientation: 'bottom'
						 
					});
			});
}

function link_to_flight()
{
	$.ajax({
				type: "POST",
				url: "./ajax/link_to_flight.php",
				data:$('.linkFlight').serialize()
				})
			.done(function( msg ) {
				$('#dynamic_modal').modal('hide');
				show_preflight()
			});
}

function delete_flight(id)
{
		
		bootbox.confirm("Are you sure to delete the selected Record?", function(result)
		{
			if(result) 
			{
				$("#loading").modal('show');
				$.ajax({
						type: "POST",
						url: "./ajax/delete_flight.php",
						data: {id:id}
						})
					.done(function( msg ) {
						show_flight('flight_date','ASC');
					});
			}
		});
}

function delete_preflight(id)
{
		
		bootbox.confirm("Are you sure to delete the selected Record?", function(result)
		{
			if(result) 
			{
				$("#loading").modal('show');
				$.ajax({
						type: "POST",
						url: "./ajax/delete_preflight.php",
						data: {id:id}
						})
					.done(function( msg ) {
						show_preflight();
					});
			}
		});
}


function cancle(id)
{
	$('#'+id).modal('hide');
	$('#'+id).removeData('bs.modal');		
}