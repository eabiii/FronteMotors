<?php
	include 'admincontent/adminheader.php';
?>

			<form class="myform2" action="adminAddTransacService.php" method="POST">
			<center>
				<label><b><h2>Basic Vehicle Inspection</h2></b></label><br>
			<table class="table1">
				<tr>
					<td><b>Plate Number:</b></td>
					<td>
						<select name="plateNum" class="inputvalues2" required>
							<?php
								$query="select plateNo from Vehicles";
								$query_run = mysqli_query($con,$query);	
								$options="";

								while($row = $query_run->fetch_row()){
									echo "<option value='$row[0]'>$row[0]</option>";
								}					
							?>							
						</select>
					</td>
				</tr>
				<tr>
					<td><b>Branch:</b></td>
					<td><input name="branch" class="inputvalues2" type="text" required="required"/><br></td>
				</tr>
					<td>
						<label><b>Date In:</b></label>
					</td>
					<td>
						<input type="date" class="inputvalues2" name="dateIn" />
					</td>
				</tr>
				<tr>
					<td>
						<label><b>Time In:</b></label>
					</td>
					<td>
						<input type="time"  class="inputvalues2" name="timeIn">
					</td>
				</tr>
			</table>
				<table class="table2">
					<tr> 
						<td> F = Full </td>
						<td> L = Low </td>
						<td> G = Good </td>
						<td> R = Replace </td>
					</tr>
				</table>
				<table class="doubletable">
					<td>
					<table class="table3">
					<tr>
						<th>Fluids</th>
						<th>F</th>
						<th>L</th>
						<th>R</th>
					</tr>
					<tr>
						<td>Oil</td>
						<td><input type="radio" name="oil" value="F" required="required"/></td>
						<td><input type="radio" name="oil" value="L" required="required"/></td>
						<td><input type="radio" name="oil" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Brakes</td>
						<td><input type="radio" name="brakes" value="F" required="required"/></td>
						<td><input type="radio" name="brakes" value="L" required="required"/></td>
						<td><input type="radio" name="brakes" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Steering</td>
						<td><input type="radio" name="steering" value="F" required="required"/></td>
						<td><input type="radio" name="steering" value="L" required="required"/></td>
						<td><input type="radio" name="steering" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>MT/AT</td>
						<td><input type="radio" name="mtat" value="F" required="required"/></td>
						<td><input type="radio" name="mtat" value="L" required="required"/></td>
						<td><input type="radio" name="mtat" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Coolant</td>
						<td><input type="radio" name="coolant" value="F" required="required"/></td>
						<td><input type="radio" name="coolant" value="L" required="required"/></td>
						<td><input type="radio" name="coolant" value="R" required="required"/></td>
					</tr>
					</table>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
					<table class="table4">
					<tr>
						<th>Belts & Hoses</th>
						<th>G</th>
						<th>R</th>
					</tr>
					<tr>
						<td>Aircon</td>
						<td><input type="radio" name="aircon" value="G" required="required"/></td>
						<td><input type="radio" name="aircon" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Alternator</td>
						<td><input type="radio" name="alternator" value="G" required="required"/></td>
						<td><input type="radio" name="alternator" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Power Steering</td>
						<td><input type="radio" name="powerSteering" value="G" required="required"/></td>
						<td><input type="radio" name="powerSteering" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Radiator Hose</td>
						<td><input type="radio" name="radiatorHose" value="G" required="required"/></td>
						<td><input type="radio" name="radiatorHose" value="R" required="required"/></td>
					</tr>
					<tr>
						<td>Fuel Hose</td>
						<td><input type="radio" name="fuelHose" value="G" required="required"/></td>
						<td><input type="radio" name="fuelHose" value="R" required="required"/></td>
					</tr>					
					</table>
				</table>
				<br>
				<table class="table5">
					<tr>
						<td> <b>Brake Fluid Contamination Level:</b> <select name="level" class="inputvalues4" required="required">
							 <option value=0>0</option>
							 <option value=1>1</option>
							 <option value=2>2</option>
							 <option value=3>3</option>
							 <option value=4>4</option>
							</select> </td>
					</tr>
				
				</table>
				<br>
				<table class="table6">
					<tr>
						<th>Others</th>
						<th>G</th>
						<th>R</th>
					</tr>
					<tr>
						<td> Air Cleaner </td>
						<td><input type="radio" name="airCleaner" value="G" required="required"/></td>
						<td><input type="radio" name="airCleaner" value="R" required="required"/></td>
					</tr>
					<tr>
						<td> Tires </td>
						<td><input type="radio" name="tires" value="G" required="required"/></td>
						<td><input type="radio" name="tires" value="R" required="required"/></td>
					</tr>
					<tr>
						<td> Battery Test </td>
						<td><input type="radio" name="batteryTest" value="G" required="required"/></td>
						<td><input type="radio" name="batteryTest" value="R" required="required"/></td>
					</tr>
					<tr>
						<td> Brake Pads </td>
						<td><input type="radio" name="brakePads" value="G" required="required"/></td>
						<td><input type="radio" name="brakePads" value="R" required="required"/></td>
					</tr>
				</table>
				<br>
				<table class="table7">
					<tr>
						<td>Special Instructions:</td>
						<td><input type="text" class="inputvalues3" name="specialInstructions" required="required"/></td>
					</tr>
					<tr>
						<td><label for="concerns1">Problems/Concerns:</label></td>
						<td>
			
						<select name="concerns" class="inputvalues3" required>
					<?php
						$query = "select problemID, problemName from problems";
						$query_run = mysqli_query($con,$query);

						while ($row = $query_run->fetch_row()) {
					        echo "<option value='$row[0]'>$row[1]</option>";
					    }
					?>
				</select></td>
					</tr>
					<tr>
						<td>Other Informations:</td>
						<td><input type="text" class="inputvalues3" name="otherInfo" required="required"/></td>
					</tr>
				</table>
				<br>
				<input name="submit" type="submit" id="submit_btn" value="Proceed"/><br><br>
				<a href="adminHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>
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

		

</html>
