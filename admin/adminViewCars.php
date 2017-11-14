<?php

	include 'admincontent/adminheader.php';

?>		

			<form class="myform" action="adminViewCars.php" method="POST">
				
				
				<label><b><h2>Vehicle Profile</h2></b></label><br>
				

				<label><b>Plate Number:</b></label>
				<?php
				echo $plateNo = 'KKK-888';
				?>	
				<br><br>

				<label><b>Owner:</b></label>
				<?php
							$query="SELECT Firstname, Lastname from usertb join vehicles on usertb.UserID = vehicles.ownerID where vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['Firstname'],' ',$row['Lastname']; 
							}
				?>	
				<br><br>				
															
				<label><b>Make:</b></label>
				<?php
							$query="SELECT make FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['make'];
							}
				?>	
				<br><br>

				<label><b>Model:</b></label>
				<?php
							$query="SELECT model FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['model'];
							}
				?>	
				<br><br>				

				<label><b>Engine Displacement:</b></label>
				<?php
							$query="SELECT engineDisplacement FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['engineDisplacement'];
							}
				?>	
				<br><br>				

				<label><b>Year Model:</b></label>
				<?php
							$query="SELECT yearModel FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['yearModel'];
							}
				?>	
				<br><br>	

				<label><b>Transmission:</b></label>
				<?php
							$query="SELECT transmission FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['transmission'];
							}
				?>	
				<br><br>				

				<label><b>Fuel:</b></label>
				<?php
							$query="SELECT fuel FROM vehicles WHERE vehicles.plateNo = '$plateNo'";
							$query_run = mysqli_query($con,$query);

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
								echo $row['fuel'];
							}
				?>	
				<br><br><br>				

				<center>
				
				<a href="adminViewAll.php"><input type="button" id="submit_btn" value="Back"/></a><br><br>
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