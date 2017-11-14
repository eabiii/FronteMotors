<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	 	session_start();
  	$userid=$_SESSION['userid'];
  	$checklistID=$_SESSION['checklistID'];
	require '../config.php';
	$query1="SELECT * FROM usertb WHERE UserID='".$userid."'";
	$result1=mysqli_query($con,$query1);
	$row=mysqli_fetch_assoc($result1);
	$query2="SELECT * FROM `partsdetails` 
			 INNER JOIN  `car parts` ON `partsdetails`.partId=`car parts`.partID 
			 INNER JOIN  `servicechecklist` ON `partsdetails`.checklistID = `servicechecklist`.checklistID 
			 WHERE `partsdetails`.checklistID='".$checklistID."' AND status = 'Done' ";
	$result2=mysqli_query($con,$query2)or die("Error " . mysqli_error($con));

	$query3="SELECT SUM(total)  AS value_sum FROM `partsdetails`
			INNER JOIN  `servicechecklist` ON `partsdetails`.checklistID = `servicechecklist`.checklistID 
			WHERE `partsdetails`.checklistID='".$checklistID."' AND status='Done'";
	$result3=mysqli_query($con,$query3);
	$row3=mysqli_fetch_assoc($result3);
?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='../invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='../invoice/print.css' media="print" />
	<script type='text/javascript' src='../invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='../invoice/js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">FRONTE MOTOS INC. </textarea>
		
		<div id="identity">
			<div id="address">
            <b>Name:</b> <?php echo $row['Firstname']." ".$row['Lastname']; ?><br /><br />
			<b>Email:</b><?php echo $row['EmailAddress'];?><br /><br />
			<b>Contact Number:</b> <?php echo $row['ContactNO'];?>
			</div>

     
              <img id="image" src="../assets/images/pic4.jpg" alt="logo" style="height:100px; width: 300px; float: right;" />
            
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea><?php echo $checklistID; ?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date"></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">₱ <?php echo $row3['value_sum']; ?>.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Item Details</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		   	<?php 
		  	while($row2=mysqli_fetch_array($result2)) {
		  		?>
		  <tr class="item-row">
		      <td style="text-align:center;"><?php echo $row2['partName'];?></td>
		      <td  style="text-align:center;"><?php echo $row2['details'];?></td>
		      <td  style="text-align:center;">₱ <?php echo $row2['amountPerItem'];?></td>
		      <td  style="text-align:center;"><?php echo $row2['quantity'];?></td>
		      <td  style="text-align:center;">₱ <?php echo $row2['total'];?></td>
		  </tr>
		  <?php } ?>
		  
		  
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">₱ <?php echo $row3['value_sum']; ?>.00</div></td>
		  </tr>
		  <!-- <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr> -->
		
		</table>
		
	<div id="terms">
		  <h5>Terms</h5>
		  <textarea>Kindly print this use ctrl-p to print.</textarea>
		</div>
	</div>
	<center><a href="adminHomepageDes.php" class="btn-success" onclick="myFunction()"/>Print</a></center>
	
</body>
<script>
	function myFunction() {
    window.print();
}
</script>
</html>
