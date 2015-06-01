<div class="modal-dialog" >
							<div class="modal-content" >
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Add New Flight</h4>
							  </div>
							  <div class="modal-body">
							  	<div class="row general-fc">
                                	<form class="addFlight">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane</label></div>
                                        <div class="col-md-6"><input type="text" name="plane" id="plane" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider</label></div>
                                        <div class="col-md-6"><input type="text" name="glider" id="glider" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Takeoff</label></div>
                                        <div class="col-md-6"><input type="text" name="takeoff" id="takeoff" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane Landing</label></div>
                                        <div class="col-md-6"><input type="text" name="plane_landing" id="plane_landing" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider Landing</label></div>
                                        <div class="col-md-6"><input type="text" name="glider_landing" id="glider_landing" class="form-control" ></div>
                                        
                                    </div><br />	
                            
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Plane Time</label></div>
                                        <div class="col-md-6"><input type="text" name="plane_time" id="plane_time" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Glider Time</label></div>
                                        <div class="col-md-6"><input type="text" name="glider_time" id="glider_time" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Towplane Max Alt</label></div>
                                        <div class="col-md-6"><input type="text" name="towplane_max_alt" id="towplane_max_alt" class="form-control" ></div>
                                    </div><br />
                                    
                                     <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Date</label></div>
                                        <div class="col-md-3"><input type="text" name="flight_date" id="flight_date" class="form-control" ></div>
                                    </div><br />
                                    
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4" style="margin-top:5px"><label>Comments</label></div>
                                        <div class="col-md-6"><input type="text" name="comments" id="comments" class="form-control" ></div>
                                    </div><br />
                                    </form>    
                                </div>	
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								<input type="button" class="btn btn-primary" value="Add New Flight" onClick="add_new_flight()" >
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->