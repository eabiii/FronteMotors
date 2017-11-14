<?php

	include 'admincontent/adminheader.php';
?>

			<div>
			<center>
				<label><b><h2>Inbox</h2></b></label><br>
					<?php
						$num=1;

							//$query = "select * from Vehicles join usertb on usertb.UserID = Vehicles.ownerID WHERE Type='2'";
							//$query_run = mysqli_query($con,$query);		

							echo '<table width="80%" border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#000000">
							<tr>
							<td width="20%"><div align="center"><b>FROM
							</div></b></td>							
							<td width="20%"><div align="center"><b>SUBJECT
							</div></b></td>
							<td width="50%"><div align="center"><b>MESSAGE
							</div></b></td>							
							<td width="5%"><div align="center"><b>
							</div></b></td>								

							</tr>';		

							while($num < 4/*$row=mysqli_fetch_assoc($query_run)*/){

							echo '<tr>
							<td width=\"5%\"><div align=\"center\"><center>Kei Vern</center>
							</a></div></td>							
							<td width=\"5%\"><div align=\"center\"><center>Secret</center>
							</div></td>
							<td width=\"5%\"><div align=\"center\">Hi may sale ba kayo?
							</a></div></td>							
							<td><a href="adminReplyBox.php"><img src="reply.png" width="20" height="20"></a><img src="delete.png" width="20" height="20"></td>							
						

							</tr>';
							$num = $num + 1;

							}
							echo '</table>';

					?>	


			</center>

			</div>

			<form class="myform" action="adminInbox.php" method="POST">		

				<center>
				<!-- <input name="submit_btn" type="submit" id="submit_btn" value="Send"/><br><br> !-->
				<br><br><br>
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
