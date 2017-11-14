<?php

	include 'admincontent/adminheader.php';
?>

			<form class="myform" action="adminAddService.php" method="POST">

				<label><b><h2>Add Service</h2></b></label>

				<label><b>Service Name:</b></label><br>
				<input name="serviceName" type="text" class="inputvalues" placeholder="Type service name" required/><br><br>	
				<label><b>Service Type:</b></label><br>
				<select name="serviceType" class="inputvalues" required>
					<option value = "Maintenance">Maintenance</option>
					<option value = "Preventive">Preventive</option>
					<option value = "Corrective">Corrective</option>
				</select> <br><br><br><br><br>

				<center>
				<input name="addService_btn" type="submit" id="addService_btn" value="Confirm"/><br><br>

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
				if(isset($_POST['addService_btn'])){
					//echo '<script type="text/javascript"> alert("Sign Up botton clicked")</script>';

					$serviceName = $_POST['serviceName'];
					$serviceType = $_POST['serviceType'];

						$query="select * from services WHERE serviceName='$serviceName' ";

						$query_run = mysqli_query($con,$query);

						if(mysqli_num_rows($query_run)>0){ // checks if there's an existing service
							//there is already a service with the same service name
							echo '<script type="text/javascript"> alert("Service name already exists.")</script>';
						}
						else
						{


							$query="insert into services (serviceName,Type) values('$serviceName','$serviceType')";
							$query_run = mysqli_query($con,$query);

							if($query_run){
								echo '<script type="text/javascript"> alert("New Service Registered.")</script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}
						}
	

				}

			?>

</html>