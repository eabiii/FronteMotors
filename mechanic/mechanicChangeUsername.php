<?php
	session_start();		include 'mechanicontent/mechanicheader.php';
?>


	
		<form class="myform" action="mechanicChangeUsername.php" method="POST">

			<label><b><h2>Change Username</h2></b></label>

			<label><b>New Username:</b></label><br>
			<input name="newUsername" type="text" class="inputvalues" placeholder="" required/><br><br>

			<label><b>Password:</b></label><br>
			<input name="Password" type="password" class="inputvalues" placeholder="" required/><br><br>

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
					$newUsername = $_POST['newUsername'];
					$cPassword = $_POST['Password'];	
						

						//This is how I echo datas from the database.
						$mechanicID =  $_SESSION['username'];
						
						$resultSet = $con->query("SELECT password FROM Mechanics WHERE mechanicID=$mechanicID");

						if($resultSet->num_rows != 0){
							while($rows = $resultSet->fetch_assoc()){
								$password = $rows['password'];


								if ($cPassword == $password) {

									$query2="select username from Mechanics WHERE username = '$newUsername' ";
									$query_run2 = mysqli_query($con,$query2);	
									
									if(mysqli_num_rows($query_run2)>0){  //there's already a plate number like that
										echo '<script type="text/javascript"> alert("Username is already taken.")</script>';
									}	

									else{
										$query="update Mechanics set username = '$newUsername' where mechanicID = '$mechanicID' ";
										$query_run = mysqli_query($con,$query);		
											if($query_run){
												echo '<script type="text/javascript"> alert("Username Changed.")</script>';
											}
											else{
												echo '<script type="text/javascript"> alert("Error!")</script>';
											}	
									}																															
								}
								else {
									echo '<script type="text/javascript"> alert("Incorrect Password!")</script>';
								}

							} 

						}

				}
		?>			

</html>