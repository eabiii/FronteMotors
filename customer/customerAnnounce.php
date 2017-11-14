<?php
		include 'customer/customerheader.php';
		$date=date('Y-m-d');
		$date2=strtotime($date);
		$date2=strtotime("+7 day", $date2);
		$date3=date('Y-m-d',$date2);
		$query="SELECT * FROM announcement WHERE Date BETWEEN '".$date."' AND '".$date3."'";
		$result=mysqli_query($con,$query);

?>
	
		<form class="myform" id="example"  style="width:90%;  margin-left:70px;  margin-bottom: 25px !important; " action="customerAnnounce.php" method="POST">
			<label><b><h2>Announcements:</h2></b></label>
				<center><label><b><h3>From: <?php echo $date; ?> To: <?php echo $date3; ?></h3></b></label><br></center>
				<center>
					<table id="example2" class="table table-striped table-bordered"   cellspacing="0" width="100%">
						<thead>
							<tr>
							<th style="width:250px !important;">Date</th>
							<th style="width:500px !important;">Title</th>
							<th style="width:500px !important;">Message</th>
							</tr>
						</thead>
						<tbody>

							<?php while($row=mysqli_fetch_assoc($result)){ ?>
							<tr>
							 	<td ><?php echo $row['Date']; ?> </td>
							 	<td ><?php echo $row['Title']; ?> </td>
							 	<td ><?php echo $row['Message']; ?> </td>
							 </tr>
							 <?php } ?>
						</tbody>
					</table>
				</center>
				<br /> <br />
			<center><a href="customerHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage" style="width:13%;"/></a></center>
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