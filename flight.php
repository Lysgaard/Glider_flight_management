<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Flight Management</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">


<script type="text/javascript" src="./bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/functions.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap-datepicker.js"></script>

<div class="xs-col-12" style="font-size:2vmin;margin:0px;padding:0px;">

<div id="container" class="col-xs-12">

<div class="modal fade" style="overflow-y:scroll;" id="dynamic_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
						  
</div><!-- /.modal -->


<div class="modal fade" id="preflight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
						  <div class="modal-dialog" >
							<div class="modal-content" >
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Add New Pre Flight</h4>
							  </div>
							  <div class="modal-body">
							  	<div class="row general-fc">
                                	<form class="addPreFlight">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Glider Name</label></div>
                                        <div class="col-md-6"><input type="text" name="glider" id="glider" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Pilot Name Seat 1</label></div>
                                        <div class="col-md-6"><input type="text" name="pilot_name_seat_1" id="pilot_name_seat_1" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Pilot Name Seat 2</label></div>
                                        <div class="col-md-6"><input type="text" name="pilot_name_seat_2" id="pilot_name_seat_2" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Launch Method</label></div>
                                        <div class="col-md-6"><input type="text" name="launch_method" id="launch_method" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>flight_type</label></div>
                                        <div class="col-md-3"><input type="radio" name="flight_type" value="Solo">&nbsp;Solo &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="flight_type" value="Duo">&nbsp;Duo
                                        </div>
                                    </div><br />	
                            
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>training_flight</label></div>
                                        <div class="col-md-6"><input type="checkbox" name="training_flight" value="Yes" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>guest_start</label></div>
                                        <div class="col-md-6"><input type="checkbox" name="guest_start" value="Yes" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Take off Time</label></div>
                                        <div class="col-md-6"><input type="text" name="takeoff_time" id="takeoff_time" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3" style="margin-top:5px"><label>Landing Time</label></div>
                                        <div class="col-md-6"><input type="text" name="landing_time" id="landing_time" class="form-control" ></div>
                                    </div><br />
                                    </form>    
                                </div>	
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								<input type="button" class="btn btn-primary" value="Add New Pre Flight" onClick="add_new_preflight()" >
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
            

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="loading" class="modal fade" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										
                                        <div class="modal-body">
											<div class="scroller"  style="height:100px;padding-top:30px;" data-always-visible="1" data-rail-visible1="1">
												<div class="row" align="center">
													<img src="./images/loading.gif" width="50" height="50">&nbsp;&nbsp;&nbsp;Loading Content.....
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            
            
<div class="modal fade" id="ajax" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
								<div class="page-loading page-loading-boxed">
									<img src="../../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
									<span>
									&nbsp;&nbsp;Loading... </span>
								</div>
								<div class="modal-dialog" >
									<div class="modal-content">
									</div>
								</div>
							</div>
                            
<div class="page-header">

<ul class="nav nav-pills">
  <li role="presentation"><a href="#" onClick="show_public_flight('flight_date','ASC')">Show Flight Information</a></li>
</ul>

</div>

<div class="row">
	<div class="col-md-12" id="div_main_content"></div>
    
</div>

   
</div>    

</div>
</body>
</html>     