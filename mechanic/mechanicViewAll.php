<?php
	include 'mechanicontent/mechanicheader.php';
?>

				<br><br><br><br><br>
				<center><label><b><h2>List of Vehicles and their Owners</h2></b></label><br></center>

					<?php
							$query = "select * from Vehicles join usertb on usertb.UserID = Vehicles.ownerID";
							$query_run = mysqli_query($con,$query);		

							echo '<table width="75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
							<tr>
							<td width="5%"><div align="center"><b>PLATE NUMBER
							</div></b></td>							
							<td width="5%"><div align="center"><b>OWNER / CUSTOMER ID
							</div></b></td>
							<td width="5%"><div align="center"><b>FIRST NAME
							</div></b></td>
							<td width="5%"><div align="center"><b>LAST NAME
							</div></b></td>

							</tr>';		

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){

							echo "<tr>
							<td width=\"5%\"><div align=\"center\">{$row['plateNo']}
							</div></td>							
							<td width=\"5%\"><div align=\"center\">{$row['UserID']}
							</div></td>
							<td width=\"5%\"><div align=\"center\">{$row['Firstname']}
							</div></td>
							<td width=\"5%\"><div align=\"center\">{$row['Lastname']}
							</div></td>

							</tr>";

							}
							echo '</table>';

					?>			

			<form class="myform" action="mechanicViewAll.php" method="POST">
				
				<center>						
					<a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a><br><br>
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