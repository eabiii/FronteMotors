<?php

	include 'admincontent/adminheader.php';
?>

			<form class="myform" action="adminAnnounce.php" method="POST">
				
				<label><b><h2>Make Announcement</h2></b></label><br>
				
				<label><b>Title:</b></label><br>
				<input name="title" type="text" class="inputvalues" placeholder="" required/><br><br>

				<label><b>Message:</b></label>	<br>
				<textarea rows="6" cols="62" name="message"> </textarea> <br><br>	


				<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Send"/><br><br> 

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
						$date=date('Y-m-d');
						$title=$_POST['title'];
						$message=$_POST['message'];
						
						$query="INSERT INTO announcement (Message,Title,Date) VALUES ('$message','$title','".$date."');";
						$result=mysqli_query($con,$query)or die("Error " . mysqli_error($con));
						if($result)
						{
							echo "<script>alert('Adding Announcement SuccessFull')</script>";
						}
					}

			?>

</html>
