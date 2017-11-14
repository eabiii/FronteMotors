<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	 	session_start();
  	// $userid=$_SESSION['userid'];

	require '../config.php';
	$dateFrom=$_POST['datefrom'];
	$dateTo=$_POST['dateto'];
	$sql="SELECT COUNT('serviceID'),`services`.serviceName FROM `servicechecklist` 
		INNER JOIN `services` ON `servicechecklist`.serviceID=`services`.serviceID
		INNER JOIN `basic vehicle inspection` ON `basic vehicle inspection`.basicInspectionID=`servicechecklist`.basicInspectionID
		WHERE `basic vehicle inspection`.`dateIn` BETWEEN '".$dateFrom."' AND  '".$dateTo."'
		GROUP BY `servicechecklist`.serviceID ORDER BY COUNT('serviceID') DESC";
	$result=mysqli_query($con,$sql)or die("Error " . mysqli_error($con));
?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Most Availed Service Report</title>
	
	<link rel='stylesheet' type='text/css' href='../invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='../invoice/print.css' media="print" />
	<script type='text/javascript' src='../invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='../invoice/js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">Most Availed Service Report</textarea>
		
		<center>
			<div>
				 <img id="image" src="../assets/images/pic4.jpg" alt="logo" style="height:100px; width: 300px;" />
	        </div>
	        <h2>From: <u><?php echo $dateFrom;?></u> To: <u><?php echo $dateTo;?></u></h2>
	    </center>
		
		<div style="clear:both"></div>
		
		
		
		<table id="items">
		
		  <tr>
		      <th>Service Name</th>
		     
		      <th>Service Count</th>
		  </tr>
		  
	
		  <tr class="item-row">
		  
		  </tr>
		 <?php
		 $plus="";
		 while($row=mysqli_fetch_assoc($result)){
		 	//$plus +=$row["COUNT('serviceID')"];
		 ?>
		 <tr>
	 		<td style="text-align:center;"><?php echo $row['serviceName']; ?></td>

	 		<td style="text-align:center;"><?php echo $row["COUNT('serviceID')"]; ?></td>
		 </tr>
		 <?php
		}
		 ?>
		  <tr>

		      
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
