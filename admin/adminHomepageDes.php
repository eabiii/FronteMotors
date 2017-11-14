<?php
	include 'admincontent/adminheader.php';
?>
	<div class="main">	
		<center>
				<center><img src="../assets/images/adminIcon.png" class="adminIcon"/>			
					<h3>Welcome Admin!</h3>
					<h5>
						<?php
							//This is how I echo datas from the database.
							
							$resultSet = $con->query("SELECT * FROM usertb WHERE userID='$userid' AND Type='1' ");

							if($resultSet->num_rows != 0){
								while($rows = $resultSet->fetch_assoc()){
									$fname = $rows['Firstname'];
									$lname = $rows['Lastname'];
									$usernameDB = $rows['Username'];

									//echo $fname;
									echo "<p>Name: $fname $lname</p>";
									echo "<p>User ID: $userid</p>";
									echo "<p>Username: $usernameDB</p>";
								}
							}
							else{
								while($rows = $resultSet->fetch_assoc()){
									$fname = $rows['Firstname'];
									$lname = $rows['Lastname'];
									$usernameDB = $rows['Username'];

									//echo $fname;
									echo "<p>Name: $fname $lname</p>";
									echo "<p>User ID: $userid</p>";
									echo "<p>Username: $usernameDB</p>";
								}								
							}

											
						?>
					</h5>					
					<a href="adminChangeUsername.php"><h5>Change Username</h5></a>
					<a href="adminChangePassword.php"><h5>Change Password</h5></a>
				</center>
		</center>

		<form class="myform" action="adminHomepageDes.php" method="POST">
			<center><input name="logout" type="submit" id="logout_btn" value="Log Out"/></center>
		</form>

		<?php
				if(isset($_POST['logout'])){
					session_destroy();
					header('Location:../index.php');
				}
		?>
	</div>	
<?php
	include 'admincontent/adminfooter.php'; 
?>