<?php
	include 'mechanicontent/mechanicheader.php';
			$date=date('Y-m-d');
		// $sql="SELECT * FROM `vehicles` WHERE ownerId='". $userid."'";
		// $result=mysqli_query($con,$sql);
		// $row=mysqli_fetch_assoc($result);
		$sql2="SELECT * FROM `basic vehicle inspection` 
		INNER JOIN  `servicechecklist` ON `basic vehicle inspection`.basicInspectionID = `servicechecklist`.basicInspectionID
		INNER JOIN  `services` ON `services`.serviceID = `servicechecklist`.serviceID
		WHERE  `servicechecklist`.status='on progress' 
		AND `services`.Type='Maintenance'";
		$result2=mysqli_query($con,$sql2);
?>

			<form class="myform" action="mechanicCheckConfirmations.php" method="POST">
				
				<label><b><h2>Check Confirmation:</h2></b></label><br>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Plate Number</th>
						<th>Service Name</th>
						<th>Date Return</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row2=mysqli_fetch_assoc($result2)){
						?>
						<tr>
							<td style="width:150px !important;"><?php echo $row2['plateNo']; ?></td>
							<td style="width:150px !important;"><?php echo $row2['serviceName']; ?></td>
							<td style="width:150px !important;">
								<?php 
								$var=$row2['dateIn'];
								echo date( "M-d-Y", (strtotime($var) + 259200)); ?>
							</td>
							<td style="width:150px !important;">
								<?php echo $row2['status']; ?>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			
<br /><br />
			<center><a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a></center>

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
