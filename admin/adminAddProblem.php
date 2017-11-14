<?php

	include 'admincontent/adminheader.php';

?>

			<form class="myform" action="adminAddProblem.php" method="POST">

				<label><b><h2>Add Problem</h2></b></label><br>

				<label><b>Problem or Concern:</b></label><br>
				<input name="problemName" type="text" class="inputvalues" placeholder="Type problem or concern" required/><br><br>									
				<center>
				<input name="addProblem_btn" type="submit" id="addProblem_btn" value="Confirm"/><br><br>

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
				if(isset($_POST['addProblem_btn'])){
					//echo '<script type="text/javascript"> alert("Sign Up botton clicked")</script>';

					$problemName = $_POST['problemName'];

						$query="select * from Problems WHERE problemName='$problemName' ";

						$query_run = mysqli_query($con,$query);

						if(mysqli_num_rows($query_run)>0){ // checks if there's an existing problem
							//there is already a problem with the same problem name
							echo '<script type="text/javascript"> alert("Same problem or concern already exists.")</script>';
						}
						else
						{
							$query="insert into Problems (problemName) values('$problemName')";
							$query_run = mysqli_query($con,$query);

							if($query_run){
								echo '<script type="text/javascript"> alert("New Problem or Concern Registered.")</script>';
							}
							else{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}
						}
	

				}

			?>


</html>