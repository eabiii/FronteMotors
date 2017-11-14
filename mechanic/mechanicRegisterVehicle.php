<?php
		include 'mechanicontent/mechanicheader.php';
?>
			<form class="myform" action="mechanicRegisterVehicle.php" method="POST">

				<label><b><h2>Register Vehicle</h2></b></label><br>

				<label><b>Plate Number:</b></label><br>
				<input name="plateNo" type="text" class="inputvalues" placeholder="Type plate number" required/><br><br>

				<label><b>Owner ID:</b></label><br>
				<select name="ownerID"  class="inputvalues" required>
					<?php
						$query="select * from usertb WHERE type='2' ";
						$query_run = mysqli_query($con,$query);	
						$options="";
						// $row=mysqli_fetch_assoc();
						while($row = mysqli_fetch_array($query_run)){
							echo "<option value='$row[0]'>$row[0] - $row[1] $row[2]</option>";
						}					
					?>
				</select>
				<br><br>

				<label><b>Make:</b></label><br>
				<input name="make" type="text" class="inputvalues" placeholder="Make" required/><br><br>

				<label><b>Model:</b></label><br>
				<input name="model" type="text" class="inputvalues" placeholder="Type model" required/><br><br>	

				<label><b>Engine Displacement:</b></label><br>
				<input name="engineDisplacement" type="text" class="inputvalues" placeholder="Type Engine Displacement" required/><br><br>	

				<label><b>Year Model:</b></label><br>
				<input name="yearModel" type="text" class="inputvalues" placeholder="Type Year Model" required/><br><br>

				<label><b>Transmission:</b></label>		
						Manual
						<input type="radio" name="transmission" value="MT"  required="required"/> 
						Automatic
						<input type="radio" name="transmission" value="AT"  required="required"/>			
						<br><br>

				<label><b>Fuel:</b></label>			
						Gas
						<input type="radio" name="fuel" value="Gas"  required="required"/>
						Diesel
						<input type="radio" name="fuel" value="Dsl"  required="required"/>								
						<br><br>
																											
				<center>
					<input name="registerVehicle_btn" type="submit" id="registerVehicle_btn" value="Confirm Register"/><br><br>

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

			<?php
				//if the button Confirm Register is clicked
				if(isset($_POST['registerVehicle_btn'])){

						$plateNo = $_POST['plateNo'];
						$ownerID = $_POST['ownerID'];
						$make = $_POST['make'];
						$model = $_POST['model'];
						$engineDisplacement = $_POST['engineDisplacement'];
						$yearModel = $_POST['yearModel'];
						$transmission = $_POST['transmission'];
						$fuel = $_POST['fuel'];					

						// for plateno
						$query="select * from Vehicles WHERE plateNo = '$plateNo'";
						$query_run = mysqli_query($con,$query);

						// for ownerID/customerID
						$query2="select * from usertb WHERE UserID = '$ownerID'";
						$query_run2 = mysqli_query($con,$query2);



						if(mysqli_num_rows($query_run)>0 && mysqli_num_rows($query_run2)<1){
						echo '<script type="text/javascript"> alert("Vehicle already registered and OwnerID does not exist.")</script>';						
						}
						else if(mysqli_num_rows($query_run)>0){  //there's already a plate number like that
						echo '<script type="text/javascript"> alert("Vehicle already registered.")</script>';
						}
						else if(mysqli_num_rows($query_run2)<1){ //if customerID does not exist
						echo '<script type="text/javascript"> alert("OwnerID does not exist.")</script>';
						}
						else
						{
							$query="Insert into Vehicles Values ('$plateNo','$ownerID','$make','$model','$engineDisplacement','$yearModel','$transmission','$fuel');"; 
							$query_run = mysqli_query($con,$query);

							if($query_run){
								echo '<script type="text/javascript"> alert("Vehicle Registered.")</script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}
						}

				}

			?>


</html>