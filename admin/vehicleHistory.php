<?php
require '../config.php';
$plate=$_GET['plateNo'];

$sql = "SELECT * FROM `basic vehicle inspection`
INNER JOIN `problems` ON  `basic vehicle inspection`.`problems/concerns`=`problems`.`problemID`	
WHERE `basic vehicle inspection`.plateNo='".$plate."'";

$result = mysqli_query($con, $sql)or die("Error " . mysqli_error($con));
$count	= mysqli_num_rows($result);

?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'BVI')">Basic Vehicle Inspection</button>
  <button class="tablinks" onclick="openCity(event, 'Services')">Services</button>
  <button class="tablinks" onclick="openCity(event, 'Parts')">Parts</button>
</div>
<?php
    while($row = mysqli_fetch_array($result)) {

	 ?>
<div id="BVI" class="tabcontent">
	<div class="fluids">
		 <center><h3>Fluids</h3></center>
			 <label><b>Oil:</b></label>
				 <?php
				 if($row['oil'] = 'F')
				 {
				 	echo 'Full';
				 }else if($row['oil'] = 'L')
				 {
					echo 'Low';
				 }else if($row['oil'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				<br>
			 <label><b>Brakes:</b></label>
				 <?php
				 if($row['brakes'] = 'F')
				 {
				 	echo 'Full';
				 }else if($row['brakes'] = 'L')
				 {
					echo 'Low';
				 }else if($row['brakes'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Steering:</b></label>
				 <?php
				 if($row['steering'] = 'F')
				 {
				 	echo 'Full';
				 }else if($row['steering'] = 'L')
				 {
					echo 'Low';
				 }else if($row['steering'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>MT / AT:</b></label>
				 <?php
				 if($row['MT/AT'] = 'F')
				 {
				 	echo 'Full';
				 }else if($row['MT/AT'] = 'L')
				 {
					echo 'Low';
				 }else if($row['MT/AT'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Coolant:</b></label>
				 <?php
				 if($row['coolant'] = 'F')
				 {
				 	echo 'Full';
				 }else if($row['coolant'] = 'L')
				 {
					echo 'Low';
				 }else if($row['coolant'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>

	</div>
	<div class="bAH">
		 <center><h3>Belt & Hoses</h3></center>
		 	<label><b>Aircon:</b></label>
				 <?php
				 if($row['aircon'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['aircon'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				<br>
			 <label><b>Alternator:</b></label>
				 <?php
				 if($row['alternator'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['alternator'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Power Steering:</b></label>
				 <?php
				 if($row['powerSteering'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['powerSteering'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Radiator Hose:</b></label>
				 <?php
				 if($row['radiatorHose'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['radiatorHose'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Fuel Hose:</b></label>
				 <?php
				 if($row['fuelHose'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['fuelHose'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
	</div>
	<div class="others">
		 <center><h3>Others</h3></center>
		 	<label><b>Air Cleaner:</b></label>
				 <?php
				 if($row['airCleaner'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['airCleaner'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				<br>
			 <label><b>Tires:</b></label>
				 <?php
				 if($row['tires'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['tires'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Battery Test:</b></label>
				 <?php
				 if($row['batteryTest'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['batteryTest'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
			 <label><b>Brake Pads:</b></label>
				 <?php
				 if($row['brakePads'] = 'G')
				 {
				 	echo 'Good';
				 }else if($row['brakePads'] = 'R')
				 {
				 	echo 'Replace';
				 }
				 ?>
				 <br>
	</div>
	<div class="comments">
		 <center><h3>Comments</h3></center>
		 	<label><b>Brake Fluid Contamination Level:</b></label>
				 <?php
					echo $row['brakeFluidLevel'];
				 ?>
				 <br>
		 	<label><b>Special Instructions:</b></label>
				<?php
					echo $row['specialInstructions'];
				 ?>
				<br>
			<label><b>Problems / Concerns:</b></label>
				<?php
					echo $row['problemName'];
				 ?>
				<br>
			<label><b>Other Information:</b></label>
				<?php
					echo $row['otherInformations'];
				 ?>
	</div>
</div>
		<div id="Services" class="tabcontent">
			  <div class="serviceInfo">
					 <center><h3>Service Information</h3></center>
				<?php
				$sql2 = "SELECT * FROM `servicechecklist`
				INNER JOIN `basic vehicle inspection` ON 
				`servicechecklist`.basicInspectionID = `basic vehicle inspection`.basicInspectionID
				INNER JOIN `usertb` ON 
				`servicechecklist`.mechanicID = `usertb`.UserID
				INNER JOIN `services` ON 
				`servicechecklist`.serviceID = `services`.serviceID
				WHERE `basic vehicle inspection`.plateNo='".$plate."'";

				$result2 = mysqli_query($con, $sql2)or die("Error " . mysqli_error($con));
				$count2	= mysqli_num_rows($result2);
				$number=0;
				  while($row = mysqli_fetch_array($result2)) {
				  	$number++;
				?>
				<div class="con1">
					<div class="ser1">
						<label><b>Service Name <?php echo $number; ?>:</b></label>
							 <?php
								echo $row['serviceName'];
							 ?>
							 <br>
					 	<label><b>Service Type<?php echo $number; ?>:</b></label>
							 <?php
								echo "₱ ".$row['Type'];
							 ?>
							 <br>
						 <label><b>Price <?php echo $number; ?>:</b></label>
							 <?php
								echo "₱ ".$row['price'];
							 ?>
							 <br>
						<label><b>Date and Time IN <?php echo $number; ?>:</b></label>
							 <?php
								echo $row['dateIn']." ".$row['timeIn'];
							 ?>
							 <br>
						<label><b>Date and Time OUT <?php echo $number; ?>:</b></label>
							 <?php
								echo $row['dateOut']." ".$row['timeOut'];
							 ?>	 
					</div>
					<div class="mec1">	 
						 <label><b>Assign Mechanic<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['Firstname']." ".$row['Lastname'];
							 ?>
							 <br>
						<label><b>Mechanic Contact No.<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['ContactNO'];
							 ?>	
							 <br>
						<label><b>Mechanic Email<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['EmailAddress'];
							 ?>
							 <br>
						<label><b>Status<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['status'];
							 ?>	
					</div>	 		 
				</div>	 
				<?php
				   	}
				mysqli_free_result($result2);
				?>
			  </div>
		</div>

<div id="Parts" class="tabcontent">
	<div class="partsUsed">
					 <center><h3>Parts Used Information</h3></center>
				<?php
				$sql2 = "SELECT * FROM `servicechecklist`
				INNER JOIN `basic vehicle inspection` ON 
				`servicechecklist`.basicInspectionID = `basic vehicle inspection`.basicInspectionID
				INNER JOIN `usertb` ON 
				`servicechecklist`.mechanicID = `usertb`.UserID
				INNER JOIN `services` ON 
				`servicechecklist`.serviceID = `services`.serviceID
				INNER JOIN `partsdetails` ON 
				`servicechecklist`.checklistID = `partsdetails`.checklistID
				INNER JOIN `car parts` ON 
				`partsdetails`.partID = `car parts`.partID
				WHERE `basic vehicle inspection`.plateNo='".$plate."'";

				$result2 = mysqli_query($con, $sql2)or die("Error " . mysqli_error($con));
				$count2	= mysqli_num_rows($result2);
				$number=0;
				  while($row = mysqli_fetch_array($result2)) {
				  	$number++;
				?>
				<div class="con1">
					<div class="ser1">
						<label><b>Parts Name <?php echo $number; ?>:</b></label>
							 <?php
								echo $row['partName'];
							 ?>
							 <br>
					 	<label><b>Price Per Item<?php echo $number; ?>:</b></label>
							 <?php
								echo "₱ ".$row['amountPerItem'];
							 ?>
							 <br>
						 <label><b>Quantity <?php echo $number; ?>:</b></label>
							 <?php
								echo "₱ ".$row['quantity'];
							 ?>
							 <br>
						<label><b>Details<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['details'];
							 ?>
							 <br>
						<label><b>Total<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['total'];
							 ?>	 
					</div>
					<div class="mec1">	 
						 <label><b>Assign Mechanic<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['Firstname']." ".$row['Lastname'];
							 ?>
							 <br>
						<label><b>Mechanic Contact No.<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['ContactNO'];
							 ?>	
							 <br>
						<label><b>Mechanic Email<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['EmailAddress'];
							 ?>
							 <br>
						<label><b>Status<?php echo $number; ?>:</b></label>
							 <?php
								echo $row['status'];
							 ?>	
					</div>	 	 
				</div>	 
				<?php
				   	}
				mysqli_free_result($result2);
				?>
			  </div>
</div>
	 		
<?php
    }
mysqli_free_result($result);


?>
