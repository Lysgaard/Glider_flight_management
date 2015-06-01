<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
extract($_GET); 
include('../config.php');
$result = mysql_query("SELECT * FROM flightlog_details WHERE id = '$id' ");
$row = mysql_fetch_object($result);
?>

<form class="editFlight">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancle('ajax')"></button>
	<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-xs-12">


    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane</label></div>
                                        <div class="col-md-6"><input type="text" name="plane" id="plane" class="form-control" value="<?php echo $row->plane ?>" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider</label></div>
                                        <div class="col-md-6"><input type="text" name="glider" id="glider" value="<?php echo $row->glider ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Takeoff</label></div>
                                        <div class="col-md-6"><input type="text" name="takeoff" id="takeoff" value="<?php echo $row->takeoff ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane Landing</label></div>
                                        <div class="col-md-6"><input type="text" name="plane_landing" id="plane_landing" value="<?php echo $row->plane_landing ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider Landing</label></div>
                                        <div class="col-md-6"><input type="text" name="glider_landing" id="glider_landing" value="<?php echo $row->glider_landing ?>"  class="form-control" ></div>
                                        
                                    </div><br />	
                            
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane Time</label></div>
                                        <div class="col-md-6"><input type="text" name="plane_time" id="plane_time" value="<?php echo $row->plane_time ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider Time</label></div>
                                        <div class="col-md-6"><input type="text" name="glider_time" id="glider_time" value="<?php echo $row->glider_time ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Towplane Max Alt</label></div>
                                        <div class="col-md-6"><input type="text" name="towplane_max_alt" id="towplane_max_alt" value="<?php echo $row->towplane_max_alt ?>"  class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Comments</label></div>
                                        <div class="col-md-6"><input type="text" name="comments" id="comments" value="<?php echo $row->comments ?>"  class="form-control" ></div>
                                    </div><br />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"  />

</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" onclick="cancle('ajax')" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-success" onclick="update_flight()" >Update Flight</button>
</div>

</form>