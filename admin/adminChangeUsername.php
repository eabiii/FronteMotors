<?php

	include 'admincontent/adminheader.php';
?>
<form class="myform" action="adminChangeUsername.php" method="POST">
	<label><b><h2>Change Username</h2></b></label>
		<label><b>New Username:</b></label><br>
			<input name="newUsername" type="text" class="inputvalues" placeholder="" required/><br><br>
			<label><b>Password:</b></label><br>
				<input name="Password" type="text" class="inputvalues" placeholder="" required/><br><br>
			<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Confirm"/><br><br>
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
		if(isset($_POST['submit_btn'])){
			$username=$_POST['newUsername'];
			$password=$_POST['Password'];
			$query1="SELECT * FROM usertb WHERE UserID='".$userid."' AND Password='".$password."'";
			$result1=mysqli_query($con,$query1);
			$count=mysqli_num_rows($result1);
			if($count == 1){
				$query2="UPDATE usertb SET  Username='".$username."' WHERE UserID='".$userid."'";
				$result2=mysqli_query($con,$query2);
				if($result2){
					header("location: adminHomepageDes.php");
				}else{
					header("location: adminChangeUsername.php");
				
				}
			}
			
										
		}
?>


</html>