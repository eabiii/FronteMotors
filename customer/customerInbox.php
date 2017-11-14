<?php
		include 'customer/customerheader.php';
		$date=date('Y-m-d');
		$date2=strtotime($date);
		$date2=strtotime("+7 day", $date2);
		$date3=date('Y-m-d',$date2);
		$query="SELECT * FROM announcement WHERE Date BETWEEN '".$date."' AND '".$date3."'";
		$result=mysqli_query($con,$query);

?>
	
		<form class="myform" id="example"  style="width:90%;  margin-left:70px;  margin-bottom: 25px !important; " action="customerInbox.php" method="POST">

				<center>
					<label><b><h2>Inbox</h2></b></label><br>
				</center>
					<?php
						$num=1;

							//$query = "select * from Vehicles join usertb on usertb.UserID = Vehicles.ownerID WHERE Type='2'";
							//$query_run = mysqli_query($con,$query);		

							echo '<table width="80%" border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#000000">
							<tr>						
							<td width="20%"><div align="center"><b>SUBJECT
							</div></b></td>
							<td width="20%"><div align="center"><b>INQUIRY
							</div></b></td>							
							<td width="50%"><div align="center"><b>RESPOND
							</div></b></td>							
							<td width="5%"><div align="center"><b>
							</div></b></td>								

							</tr>';		

							while($num < 5/*$row=mysqli_fetch_assoc($query_run)*/){

							echo '<tr>						
							<td width=\"5%\"><div align=\"center\"><center>Sale Inquiry</center>
							</div></td>
							<td width=\"5%\"><div align=\"center\">Hi may sale ba kayo?
							</a></div></td>								
							<td width=\"5%\"><div align=\"center\">Yes! up to 50% so hurry!
							</a></div></td>							
							<td><a href="adminReplyBox.php"><img src="reply.png" width="20" height="20"></a><img src="delete.png" width="20" height="20"></td>							
						

							</tr>';
							$num = $num + 1;

							}
							echo '</table>';

					?>	
					<br><br>



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