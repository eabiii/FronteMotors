<?php

	//ob_start();
	include 'mechanicontent/mechanicheader.php';
$sql = "select * from services ";
$result = mysqli_query($con, $sql) or die("Error " . mysqli_error($con));
$sql2= "select * from usertb where Type='3' ";
$results = mysqli_query($con, $sql2) or die("Error " . mysqli_error($con))
?>
<?php
				//if the button Confirm Register is clicked
				if(isset($_POST['submit'])){
					$plateNo = $_POST['plateNum'];
					$branch = $_POST['branch'];
					$dateIn = $_POST['dateIn'];
					$dateOut = "0000-00-00";
					$timeIn = $_POST['timeIn'];
					$timeOut = "00:00:00.000000";
					$oil = $_POST['oil'];
					$brakes = $_POST['brakes'];
					$steering = $_POST['steering'];
					$mtat= $_POST['mtat'];
					$coolant = $_POST['coolant'];
					$aircon = $_POST['aircon'];
					$alternator = $_POST['alternator'];
					$powerSteering = $_POST['powerSteering'];
					$radiatorHose = $_POST['radiatorHose'];
					$fuelHose = $_POST['fuelHose'];
					$brakeFluidLevel = $_POST['level'];
					$airCleaner = $_POST['airCleaner'];
					$tires = $_POST['tires'];
					$batteryTest = $_POST['batteryTest'];
					$brakePads = $_POST['brakePads'];
					$specialInstructions = $_POST['specialInstructions'];
					$problemsConcerns = $_POST['concerns'];
					$otherInfo = $_POST['otherInfo'];

					$query="INSERT INTO `basic vehicle inspection`(`plateNo`,`branch`,`dateIn`,`dateOut`,`timeIn`,`timeOut`,`oil`, `brakes`, `coolant`, `MT/AT`, `steering`, `aircon`, `alternator`, `powerSteering`, `batteryTest`, `fuelHose`, `radiatorHose`, `brakePads`, `airCleaner`, `tires`, `brakeFluidLevel`, `specialInstructions`, `problems/concerns`, `otherInformations`)
							VALUES ('$plateNo','$branch','$dateIn','$dateOut','$timeIn','$timeOut','$oil','$brakes','$coolant','$mtat','$steering','$aircon','$alternator','$powerSteering','$batteryTest','$fuelHose','$radiatorHose','$brakePads','$airCleaner','$tires','$brakeFluidLevel','$specialInstructions','$problemsConcerns','$otherInfo')";
					$query_run = mysqli_query($con,$query);

							if($query_run){
								$last_id = mysqli_insert_id($con);
								$notes ="";
								$paymentDate ="0000-00-00";
								
								$query1 = "INSERT INTO `service checklist`(`basicInspectionID`,`notes`,`paymentDate`) VALUES ('$last_id','$notes','$paymentDate')";
								$query_run1 = mysqli_query($con,$query1);
								
								$last_id1 = mysqli_insert_id($con);
								$timeIn = $_POST['timeIn'];
								$query2 = "INSERT INTO `service checklist details`(`checklistID`,`mechanicID`,`status`,`price`,`timeIn`,`timeOut`,`mServiceID`,`serviceID`)
										   VALUES('$last_id1','2','in progress','0.00','$timeIn','00:00:00.000000','10','1')";
								$query_run2 = mysqli_query($con,$query2);		   								
								$_SESSION['checklistID']= $last_id1;
								$_SESSION['timeIn'] = $_POST['timeIn'];
								echo '<script type="text/javascript"> alert("Basic Vehicle Inspection Registered")</script>';
							}
							
							else{
								echo mysql_error();
							}

				}

			?>
<form class="myform" action="mechanicConfirmTransac.php" method="POST">
				
				<label><b><h2>Services for the Vehicle</h2></b></label><br>

				<center>


	                <div class="form-group">  
	                     <form name="add_name" id="add_name" action="adminAssignMechanic" method="POST">  
	                          <div class="table-responsive">  
	                          	<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
	                               <table class="table table-bordered" id="dynamic_field"> 
	                               <tr>
	                               		<th>Service</th>
	                               		<th>Mechanic</th>
	                               		<th>Price</th>
	                               </tr> 
	                                    <tr>  
	                                         <td>
	                                         	<select class="inputvalues2" name="services[]" id="services">
	                                         			<?php while($row = mysqli_fetch_array($result)) { ?>
															<option value="<?php echo $row['serviceID']; ?>"><?php echo $row['serviceName']; ?></option>
														<?php } ?>
	                                         	</select>
	                                         </td> 
	                                            <td>
	                                         	  <select class="inputvalues2" name="mechanic[]" id="mechanic">
	                                         			<?php while($row = mysqli_fetch_array($results)) { ?>
															<option value="<?php echo $row['UserID']; ?>"><?php echo $row['Firstname'].",".$row['Lastname']; ?></option>
														<?php } ?>
	                                         	</select>
	                                         </td>
	                                         <td>
	                                         <input type="text" name="price[]" placeholder="Price" required class="inputvalues2" />
	                                         </td>
	                                        
	                                    </tr>  
	                               </table>  
	                                 
	                          </div>  
	                           <div class="form-group" id="addHere"></div> 
	                     </form>  
	                </div>
	                 
	                <br><br><br>
					<input name="submit_btn" type="submit" id="submit_btn" value="Submit"/><br><br>
					
					<a href="mechanicAddTransaction.php"><input type="button" id="btnBack" value="Go Back"/></a>

				</center>


			</form>
		<footer>
			<div class="footer">
				<div id="footer_text">
					<center><br><br>This product is developed by Group8.</center>
					<center>Tatlong Bibe © 2017</center>
				</div>

			</div>			
		</footer>
			<?php
				//if the button Confirm Register is clicked
				if(isset($_POST['submit_btn'])){
					header('Location:adminAssignMechanic.php');
				}


			?>
<script>  
 $(document).ready(function(){ 
 	var counters=1;
      $('#add').click(function(){  
      		   var newTextBoxDiv = $(document.createElement('div'))
    	    			 .attr("id", 'TextBoxDiv' + counters);
    						newTextBoxDiv.after().html('<div class="table-responsive"><table class="table table-bordered" id="dynamic_field"><tr> <td><select class="inputvalues2" name="services[]" id="services'+counters+'" disabled="disabled"></select></td><td><select class="inputvalues2" name="mechanic[]" id="mechanic'+counters+'"></select></td><td> <input type="text" name="price[]" placeholder="Price" required class="inputvalues2" /></td><td><button type="button"  id="removeButton2'+counters+'" class="btn btn-danger" disabled="disabled"> X </button></td> </tr> </table> </div>');
    	    			newTextBoxDiv.appendTo("#addHere");
				 	$.ajax({
				 			url: 'selectvalue.php',
						    success:function(output)
				            {
				                 $('#services'+counters).html(output); 
				                  $.ajax({
				 			url: 'selectvalue2.php',
						    success:function(data)
				            {
				                 $('#mechanic'+counters).html(data); 
				                 $('#services'+counters).removeAttr('disabled');	
				                 $('#removeButton2'+counters).removeAttr('disabled');	
				                 counters++;
				            }
				  }); 	
				            }
				  });   
				  $('#removeButton2'+counters).click(function () {
					if(counters==1){
				       	 location.reload();
				          return false;
				     }else{
				     	counters--;

				        $('#TextBoxDiv' + counters).remove();
				     }

					
				});   
      });
       
 });  
 </script>
</html>
