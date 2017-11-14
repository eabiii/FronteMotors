<?php
	
	include 'admincontent/adminheader.php';

	$sql="SELECT * FROM usertb ORDER BY UserID DESC";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$userID=$row['UserID'];
	$userID++;
?>


			<form class="myform" action="adminAddMechanic.php" method="POST">

				<label><b><h2>Add Mechanic</h2></b></label>

				<label><b>Username:</b></label><br>
				<input name="username" type="text" class="inputvalues" value="<?php echo $userID ?>" readonly><br><br>

				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type Password" required/><br><br>

				<label><b>Confirm Password:</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password" required/><br><br>

				<label><b>First Name:</b></label><br>
				<input name="firstName" type="text" class="inputvalues" placeholder="Type first name" required/><br><br>

				<label><b>Last Name:</b></label><br>
				<input name="lastName" type="text" class="inputvalues" placeholder="Type last name" required/><br><br>

				<label><b>Contact Number:</b></label><br>
				<input name="contactNo" type="text" class="inputvalues" placeholder="Type contact number" required/><br><br>

				<label><b>Email Address:</b></label><br>
				<input name="email" type="text" class="inputvalues" placeholder="Type email address" /><br><br>												
				<center>
				<input name="addMechanic_btn" type="submit" id="addMechanic_btn" value="Confirm Register"/><br><br>

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
				if(isset($_POST['addMechanic_btn'])){

					$username = $_POST['username'];
					$password = $_POST['password'];
					$cpassword = $_POST['cpassword'];
					$firstName = $_POST['firstName'];
					$lastName = $_POST['lastName'];
					$contactNo = $_POST['contactNo'];
					$emailAddress = $_POST['email'];
					$type="3";

					// if passwords are equal
					if($password==$cpassword){

							$query="insert into usertb (FirstName, LastName, ContactNo, emailAddress, Username, Password, Type) values('$firstName','$lastName','$contactNo','$emailAddress','$username','$lastName','$type')";

							$query_run = mysqli_query($con,$query);
							if($query_run){
								echo '<script type="text/javascript"> alert("Mechanic Registered.")</script>';
								$mechanicID = mysqli_insert_id($con);

								;								
								
								

							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}

					}
					//if passwords are not the same
					else{
						echo '<script type="text/javascript"> alert("Passwords does not match")</script>';
					}
	

				}

			?>

</html>