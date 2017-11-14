<?php
	include 'mechanicontent/mechanicheader.php';
    $sql="SELECT * FROM `usertb`
        INNER JOIN `vehicles` ON `usertb`.UserID = `vehicles`.ownerID
        INNER JOIN `basic vehicle inspection` ON `vehicles`.plateNo = `basic vehicle inspection`.plateNo
        INNER JOIN `servicechecklist` ON `basic vehicle inspection`.basicInspectionID = `servicechecklist`.basicInspectionID";
    $result=mysqli_query($con,$sql);
?>


				<center><label><b><h2>On Going Services</h2></b></label></center>
  <center>
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="80%">
        <thead>
            <tr>
              <th>Name</th>
              <th>Vechile Plate No.</th>
              <th>Service No.</th>
              <th>Date and Time In</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)) { ?>
              <tr>
                    <td><?php echo $row['Firstname']." ".$row['Lastname'];?></td>
                    <td><?php echo $row['plateNo'];?></td>
                    <td><?php echo $row['checklistID'];?></td>
                    <td><?php echo $row['dateIn']." ".$row['timeIn'];?></td>
                    <td><button class="btn-success"><a href="#">Update Service</a></button> <button class="btn-submit"><a href="adminAddPartsUsed.php?cID=<?php echo $row['checklistID'];?>&uID=<?php echo $row['UserID'];?>">check out</a></button></td>
              </tr>
          <?php } ?>
        </tbody>
    </table>
  </center>
  <br><br>
				
  <form class="myform">           
  <center>
			<a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>
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