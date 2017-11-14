<?php
	session_start();

		include 'mechanicontent/mechanicheader.php';
?>

	
		<form class="myform" action="mechanicChangePassword.php" method="POST">

			<label><b><h2>Change Password</h2></b></label>

			<label><b>Old Password:</b></label><br>
			<input name="oldPassword" type="password" class="inputvalues" placeholder="" required/><br><br>

			<label><b>New Password:</b></label><br>
			<input name="newPassword" type="password" class="inputvalues" placeholder="" required/><br><br>

			<label><b>Confirm Password:</b></label><br>
			<input name="cPassword" type="password" class="inputvalues" placeholder="" required/><br><br>

			<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Confirm"/><br><br>

				<a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>				
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
				if(isset($_POST['submit_btn'])){
					$oldPassword = $_POST['oldPassword'];
					$newPassword = $_POST['newPassword'];
					$cPassword = $_POST['cPassword'];	
					$mechanicID =  $_SESSION['username'];	


						//This is how I echo datas from the database.
						$resultSet = $con->query("SELECT password FROM Mechanics WHERE mechanicID=$mechanicID");

						if($resultSet->num_rows != 0){
							while($rows = $resultSet->fetch_assoc()){
								$password = $rows['password'];


								if($password != $oldPassword && $newPassword != $cPassword){
									echo '<script type="text/javascript"> alert("Old password incorrect and confirm password do not match")</script>';
								} //correct
								else if($password == $oldPassword && $newPassword != $cPassword){ 
									echo '<script type="text/javascript"> alert("Confirm password do not match")</script>';
								}
								else if($password != $oldPassword && $newPassword == $cPassword){ 
									echo '<script type="text/javascript"> alert("Old password incorrect.")</script>';
								}									
								else if ($password == $oldPassword && $newPassword == $cPassword) {

									$query="update Mechanics set password = '$newPassword' where mechanicID = '$mechanicID' ";
									$query_run = mysqli_query($con,$query);		
										if($query_run){
											echo '<script type="text/javascript"> alert("Password Changed.")</script>';
										}
										else{
											echo '<script type="text/javascript"> alert("Error!")</script>';
										}																
											}

							} 

						}

				}
		?>			

</html>