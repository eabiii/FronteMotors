<?php

	include 'admincontent/adminheader.php';
?>

			<div>
				<center>
					<label><b><h2>Reply</h2></b></label>
				</center>

			</div>

			<form class="myform" action="adminReplyBox.php" method="POST">		
				<label><b>Message:</b></label>	<br>
				<textarea rows="6" cols="62" name="message"> </textarea> <br><br>	
				<center>
				<input name="submit_btn" type="submit" id="submit_btn" value="Send"/><br><br> 
				<a href="adminInbox.php"><input type="button" id="btnBack" value="Back"/></a>
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
