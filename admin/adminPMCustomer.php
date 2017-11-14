<?php
	include 'admincontent/adminheader.php';
?>

			<form class="myform" action="adminPMCustomer.php" method="POST">
				
				<label><b><h2>Message a Customer</h2></b></label><br>
				<label><b>Customer Name:</b></label><br>
				<select name="ownerID" required>
					<?php
						$query="select * from usertb where Type='2'";
						$query_run = mysqli_query($con,$query);	
						$options="";

						while($row = $query_run->fetch_row()){
							echo "<option value='$row[0]'>$row[0] - $row[1] $row[2]</option>";
						}					
					?>
				</select>
				<br><br>

				<label><b>Message:</b></label>	<br>
				<textarea rows="6" cols="62" name="message"> </textarea> <br><br><br><br>	



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
	


			?>

</html><html>
