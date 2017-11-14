<?php
include 'mechanicontent/mechanicheader.php';
?>

				<br><br><br><br><br><br>
				<center><label><b><h2>List of Parts Used</h2></b></label><br></center>

					<?php
							$query = "select * from `Car Parts`
										join `parts form details` on `Car Parts`.partID = `parts form details`.partID
										join `Parts Form` on `parts form details`.partsFormID = `Parts Form`.partsFormID
										join `Service Checklist` on `Parts Form`.checklistID = `Service Checklist`.checklistID
										join `basic vehicle inspection` on  `Service Checklist`.basicInspectionID = `basic vehicle inspection`.basicInspectionID;";
							$query_run = mysqli_query($con,$query);		

							echo '<table width="75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
							<tr>
							<td width="5%"><div align="center"><b>PART NAME
							</div></b></td>							
							<td width="5%"><div align="center"><b>PRICE
							</div></b></td>
							<td width="5%"><div align="center"><b>DETAILS
							</div></b></td>
							<td width="5%"><div align="center"><b>DATE
							</div></b></td>


							</tr>';		

							while($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)){

							echo "<tr>
							<td width=\"5%\"><div align=\"center\">{$row['partName']}
							</div></td>							
							<td width=\"5%\"><div align=\"center\">{$row['partPrice']}
							</div></td>
							<td width=\"5%\"><div align=\"center\">{$row['details']}
							</div></td>
							<td width=\"5%\"><div align=\"center\">{$row['dateIn']}
							</div></td>							

							</tr>";

							}
							echo '</table>';

					?>				

			<form class="myform" action="mechanicViewParts.php" method="POST">
				
				<center>						
					<a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>
				</center>

			</form>
			
</html>