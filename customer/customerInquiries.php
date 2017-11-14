<?php
		include 'customer/customerheader.php';
?>
		<form class="myform" action="customerInquiries.php" method="POST">
			<label><b><h2>Inquire:</h2></b></label><br>
				<label><b>Subject:</b></label><br>
				<input name="subject" type="text" class="inputvalues" placeholder="" required/><br><br>

				<label><b>Message:</b></label>	<br>
				<textarea rows="6" cols="62" name="message"> </textarea> <br><br>	


				<center>
					<input name="submit_btn" type="submit" id="submit_btn" value="Send"/><br><br> 
					<a href="customerHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>
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