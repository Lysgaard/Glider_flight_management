<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
extract($_GET); 
include('../config.php');
$result = mysql_query("SELECT * FROM preflight WHERE id = '$id' ");
$row = mysql_fetch_object($result);
?>

<form class="editPreFlight">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancle('ajax')"></button>
	<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-xs-12">


    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider Name</label></div>
                                        <div class="col-md-6"><input type="text" name="glider" id="glider" class="form-control" value="<?php echo $row->glider ?>" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Pilot Name Seat 1</label></div>
                                        <div class="col-md-6"><input type="text" name="pilot_name_seat_1" id="pilot_name_seat_1" value="<?php echo $row->pilot_name_seat_1 ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Pilot Name Seat 2</label></div>
                                        <div class="col-md-6"><input type="text" name="pilot_name_seat_2" id="pilot_name_seat_2" value="<?php echo $row->pilot_name_seat_2 ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Launch Method</label></div>
                                        <div class="col-md-6"><input type="text" name="launch_method" id="launch_method" value="<?php echo $row->launch_method ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>flight_type</label></div>
                                        <div class="col-md-3"><input type="radio" name="flight_type"  <?php if($row->flight_type == 'Solo') {echo 'checked=checked';} ?> value="Solo">&nbsp;Solo &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="flight_type" <?php if($row->flight_type == 'Duo') {echo 'checked=checked';} ?> value="Duo">&nbsp;Duo
                                        </div>
                                    </div><br />	
                            
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>training_flight</label></div>
                                        <div class="col-md-6"><input type="checkbox" name="training_flight" <?php if($row->training_flight == 'Yes') {echo 'checked=checked';} ?>  value="Yes" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>guest_start</label></div>
                                        <div class="col-md-6"><input type="checkbox" name="guest_start" <?php if($row->guest_start == 'Yes') {echo 'checked=checked';} ?> value="Yes" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Take off Time</label></div>
                                        <div class="col-md-6"><input type="text" name="takeoff_time" id="takeoff_time" value="<?php echo $row->takeoff_time ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Landing Time</label></div>
                                        <div class="col-md-6"><input type="text" name="landing_time" id="landing_time" value="<?php echo $row->landing_time ?>"  class="form-control" ></div>
                                    </div><br />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"  />

</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" onclick="cancle('ajax')" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-success" onclick="update_preflight()" >Update Pre Flight</button>
</div>

</form>