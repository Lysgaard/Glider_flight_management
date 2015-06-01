<div class="modal-dialog modal-lg" >
							<div class="modal-content" >
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Link to Flight</h4>
							  </div>
							  <div class="modal-body">
							  	<div class="row general-fc">
                                	<form class="linkFlight">
                                     
                                    <?php
									include('../config.php');
									extract($_POST);
									$sql = "SELECT flightlog_details.*, flightlog.flight_date  FROM flightlog, flightlog_details WHERE flightlog.flight_id = flightlog_details.flight_id  AND ( glider= '$glider' )";
									$result = mysql_query($sql);
									print '<div class="col-md-10">';
									print '<div class="table-responsive">';

									print '<table class="table table-bordered">';
									print '<tr>';
										print '<th></th>';
										print '<th>Date</th>';
										print '<th>Glider</th>';
										print '<th>Takeoff</th>';
										print '<th>Plane Landing</th>';
										print '<th>Glider Landing</th>';
										print '<th>Plane Time</th>';
										print '<th>Glider Time</th>';
									print '</tr>';
									while($row= mysql_fetch_object($result))
									{
										print '<tr>';
											print "<td><input type='radio' name=id value='$row->id' ></td>";
											print '<td>'.$row->flight_date.'</td>';
											print '<td>'.$row->glider.'</td>';
											print '<td>'.$row->takeoff.'</td>';
											print '<td>'.$row->plane_landing.'</td>';
											print '<td>'.$row->glider_landing.'</td>';
											print '<td>'.$row->plane_time.'</td>';
											print '<td>'.$row->glider_time.'</td>';
										print '</tr>';
									}
									print '</table>';
									print '</div>';
									print '</div>';
									?>
                                    <input type="hidden" name="pid" value="<?php echo $id; ?>"  />
                                    </form>    
                                </div>	
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								<input type="button" class="btn btn-primary" value="Link to Flight" onClick="link_to_flight()" >
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->