<?php
		include 'customer/customerheader.php';

		$date=date('Y-m-d');
		$sql="SELECT * FROM `vehicles` WHERE ownerId='". $userid."'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$sql2="SELECT * FROM `basic vehicle inspection` 
		INNER JOIN  `servicechecklist` ON `basic vehicle inspection`.basicInspectionID = `servicechecklist`.basicInspectionID
		INNER JOIN  `services` ON `services`.serviceID = `servicechecklist`.serviceID
		WHERE `basic vehicle inspection`.plateNo = '".$row['plateNo']."' AND `servicechecklist`.status='not confirm' 
		AND `services`.Type='Maintenance'";
		$result2=mysqli_query($con,$sql2);
	
		// echo date( "Y-m-d", (strtotime($date) + 259200));
?>	
		<form class="myform" action="customerNotification.php" method="POST">
			<label><b><h2>Notifications:</h2></b></label><br>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Plate Number</th>
						<th>Service Name</th>
						<th>Date Return</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$num = 0;
						while($num < 2/* $row2=mysqli_fetch_assoc($result2)*/ ){
					?>
						<tr>
							<td style="width:150px !important;">KKK-888<?php // echo $row['plateNo']; ?></td>
							<td style="width:150px !important;">Change Oil<?php // echo $row2['serviceName']; ?></td>
							<td style="width:150px !important;">
								Nov-15-2017
								<?php 
								$num = $num +1;
								//$var=$row2['dateIn'];
								//echo date( "M-d-Y", (strtotime($var) + 259200)); ?>
							</td>
							<!-- <td style="width:150px !important;">
								<button class="btn-submit" ><a style="color:#fff;" href="customerNotifFunction.php?bid=<?php //echo $row2['basicInspectionID'];?>">Confirm</a></button>
						
							</td>
							-->
							<td><a href="#"><img src="yes.png" width="20" height="20"> </a><img src="no.png" width="20" height="20"></td>	
						</tr>
					<?php }?>


				</tbody>
			</table>
			
<br /><br />
			<center><a href="customerHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a></center>
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