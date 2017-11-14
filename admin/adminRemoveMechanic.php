<?php

	include 'admincontent/adminheader.php';
?>

			<form class="myform" action="adminRemoveMechanic.php" method="POST">

				<label><b><h2>Remove Mechanic</h2></b></label><br>

				<label><b>Mechanic ID:</b></label><br><br>

				
				<select name="mechanicID"   class="inputvalues" required>
					<?php
						$query = "select * from usertb where Type='3'";
						$query_run = mysqli_query($con,$query);

						while ($row = $query_run->fetch_row()) {
					        echo "<option value='$row[0]'>$row[0] - $row[1] $row[2]</option>";
					    }
					?>
				</select>
				
				<br><br>
				
				<center>							
					<input name="removeMechanic_btn" type="submit" id="removeMechanic_btn" value="Confirm Removal"/><br><br>

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
				if(isset($_POST['removeMechanic_btn'])){

					$mechanicID = $_POST['mechanicID'];

						$query="select * from Mechanics WHERE mechanicID = '$mechanicID'";

						$query_run = mysqli_query($con,$query);

						if(mysqli_num_rows($query_run)>0){ 

							$query="delete from Mechanics WHERE mechanicID = '$mechanicID' "; 
							$query_run = mysqli_query($con,$query);

							if($query_run){
								echo '<script type="text/javascript"> alert("Mechanic Removed.")</script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}

						}
						else
						{
							echo '<script type="text/javascript"> alert("No mechanic ID like that exist.")</script>';
						}

				}

			?>

</html>