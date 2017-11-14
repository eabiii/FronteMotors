<?php
		include 'customer/customerheader.php';
?>

		<form class="myform" action="customerChangeUsername.php" method="POST">

			<label><b><h2>Change Username</h2></b></label>

			<label><b>New Username:</b></label><br>
			<input name="newUsername" type="text" class="inputvalues" placeholder="" required/><br><br>

			<label><b>Password:</b></label><br>
			<input name="Password" type="password" class="inputvalues" placeholder="" required/><br><br>

			<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Confirm"/><br><br>

				<a href="customerHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>				
			</center>
		</form>	

		<?php
				if(isset($_POST['submit_btn'])){
					$newUsername = $_POST['newUsername'];
					$cPassword = $_POST['Password'];	
						

						//This is how I echo datas from the database.
						$customerID =  $_SESSION['username'];
						
						$resultSet = $con->query("SELECT password FROM Customers WHERE customerID=$customerID");

						if($resultSet->num_rows != 0){
							while($rows = $resultSet->fetch_assoc()){
								$password = $rows['password'];


								if ($cPassword == $password) {

									$query2="select username from Customers WHERE username = '$newUsername' ";
									$query_run2 = mysqli_query($con,$query2);	
									
									if(mysqli_num_rows($query_run2)>0){  //there's already a plate number like that
										echo '<script type="text/javascript"> alert("Username is already taken.")</script>';
									}	

									else{
										$query="update CUstomers set username = '$newUsername' where customerID = '$customerID' ";
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