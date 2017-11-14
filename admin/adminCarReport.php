<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	 	session_start();
  	// $userid=$_SESSION['userid'];

	require '../config.php';
	$dateFrom=$_POST['datefrom'];
	$dateTo=$_POST['dateto'];
	$sql="SELECT * FROM `basic vehicle inspection`
	INNER JOIN `servicechecklist` ON `servicechecklist`.basicInspectionID = `basic vehicle inspection`.basicInspectionID
	INNER JOIN `services` ON `services`.serviceID = `servicechecklist`.serviceID
	INNER JOIN `partsdetails` ON `servicechecklist`.checklistID = `partsdetails`.checklistID
	INNER JOIN `car parts` ON `partsdetails`.partID = `car parts`.partID
	WHERE `basic vehicle inspection`.dateIn BETWEEN '".$dateFrom."' AND  '".$dateTo."' GROUP BY `partsdetails`.checklistID";
	$result=mysqli_query($con,$sql);

?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Car Report</title>
	
	<link rel='stylesheet' type='text/css' href='../invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='../invoice/print.css' media="print" />
	<script type='text/javascript' src='../invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='../invoice/js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">Car Parts Report </textarea>
		
		<center>
			<div>
				 <img id="image" src="../assets/images/pic4.jpg" alt="logo" style="height:100px; width: 300px;" />
	        </div>
	        <br>

	        <h2>From: <u><?php echo $dateFrom;?></u> To: <u><?php echo $dateTo;?></u></h2>
	    </center>
		
		<div style="clear:both"></div>
		
		
		
		<table id="items">
		
		  <tr>
		      <th>Part Name</th>
		      <th>Plate No.</th>
		      <th>Date In</th>
		      <th>Date Out</th>
		      <th>Services Render</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
	
		  <tr class="item-row">
		  
		  </tr>
		 <?php
		 $plus="";
		 while($row=mysqli_fetch_assoc($result)){
		 ?>
		 <tr>
	 		<td style="text-align:center;"><?php echo $row['partName']; ?></td>
	 		<td style="text-align:center;"><?php echo $row['plateNo']; ?></td>
	 		<td style="text-align:center;"><?php echo $row['dateIn']; ?></td>
	 		<td style="text-align:center;"><?php echo $row['dateOut']; ?></td>
	 		<td style="text-align:center;"><?php echo $row['serviceName']; ?></td>
	 		<td style="text-align:center;"><?php echo $row['quantity']; ?></td>
	 		<td style="text-align:center;">
	 			<?php
	 			$query3="SELECT SUM(price)  AS value_sum FROM `servicechecklist`
						WHERE checklistID='".$row['checklistID']."'";
				$result4=mysqli_query($con,$query3);
				$ros=mysqli_fetch_assoc($result4);
				$pricefinal=$row['partPrice']*$row['quantity'];
				$sum=$ros['value_sum'] + $pricefinal;
				echo $sum;
				$plus = 5657;//$plus +=$sum;
	 			?>
	 		</td>
		 </tr>
		 <?php
		}
		 ?>
		  <tr>

		      <td colspan="5" class="blank"> </td>
		      <td colspan="1" class="total-line balance" style="text-align: center !important;">Total: </td>
		      <td class="total-value balance"><div class="due" style="text-align: center !important;"><?php echo $plus; ?></div></td>
		  </tr>
		
		</table>
		
	<div id="terms">
		  <h7>Page 1</h7>
		  <!-- <textarea>Kindly print this use ctrl-p to print.</textarea> -->
		</div>
	</div>
	<center>
		<br><br>
		<a href="adminHomepageDes.php" class="btn-success" onclick="myFunction()"/>Print</a>
	</center>
	
</body>
<script>
	function myFunction() {
    window.print();
}
</script>
</html>
