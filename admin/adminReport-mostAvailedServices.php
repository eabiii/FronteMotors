<?php

	include 'admincontent/adminheader.php';
?>
<form class="myform" action="adminServiceAvailed.php" method="POST">
				
				<label><b><h2>Most Availed Services</h2></b></label><br>


				<label><b>Select your date:</b></label><br><br>										
				From: <input type="date" name="datefrom"/> To: <input type="date" name="dateto"/><br><br><br><br><br>
														
	
				<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Submit"/><br><br>

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
</html>
