<?php
		include 'mechanicontent/mechanicheader.php';
		$userid =  $_SESSION['userid'];
?>

		<center>
			<body>
				<br>
				<br>
				<br>
				<br>
				<center><img src="../assets/images/mechanicIcon.png" class="mechanicIcon"/>			
				<h3>Welcome Mechanic!</h3>
				</center>
				<h5>
					<?php
						//This is how I echo datas from the database.
						
						$resultSet = $con->query("SELECT * FROM usertb WHERE userID='$userid' AND Type='3' ");

						if($resultSet->num_rows != 0){
							while($rows = $resultSet->fetch_assoc()){
								$fname = $rows['Firstname'];
								$lname = $rows['Lastname'];
								$usernameDB = $rows['Username'];

								//echo $fname;
								echo "<p>Name: $fname $lname</p>";
								echo "<p>Mechanic ID: $userid</p>";
								echo "<p>Username: $usernameDB</p>";
							}
						}

										
					?>
				</h5>
				<a href="mechanicChangeUsername.php"><h5>Change Username</h5></a>
				<a href="mechanicChangePassword.php"><h5>Change Password</h5></a>
			</body>
		</center>
	
		<form class="myform" action="../index.php" method="POST">
			<center><input name="logout" type="submit" id="logout_btn" value="Log Out"/></center>
		</form>

			<div class="footer">
				<div id="footer_text">
					<center><br><br>This product is developed by Group8.</center>
					<center>Tatlong Bibe © 2017</center>
				</div>

			</div>

		<?php
				if(isset($_POST['logout'])){
					session_destroy();
					header('Location:mainPage.php');
				}
		?>			

</html>