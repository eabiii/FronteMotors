<?php
	include 'admincontent/adminheader.php';
    $sql="SELECT * FROM `usertb`
        INNER JOIN `vehicles` ON `usertb`.UserID = `vehicles`.ownerID
        INNER JOIN `basic vehicle inspection` ON `vehicles`.plateNo = `basic vehicle inspection`.plateNo
        INNER JOIN `servicechecklist` ON `basic vehicle inspection`.basicInspectionID = `servicechecklist`.basicInspectionID
        WHERE `servicechecklist`.status !='Done' GROUP BY `usertb`.userID";
    $result=mysqli_query($con,$sql);
?>


				<center><label><b><h2>On Going Services</h2></b></label></center>
  <center>
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="80%">
        <thead>
            <tr>
              <th>Name</th>
              <th>Vechile Plate No.</th>
              <th>Date and Time In</th>
              <th>Total Amount</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($result)) { ?>
              <tr>
                    <td><?php echo $row['Firstname']." ".$row['Lastname'];?></td>
                    <td><?php echo $row['plateNo'];?></td>
                    <td><?php echo $row['dateIn']." ".$row['timeIn'];?></td>
                    <td>
                      <?php
                        $sql2="SELECT SUM(price)  AS value_sum FROM `servicechecklist`
                              WHERE basicInspectionID='".$row['basicInspectionID']."' AND `servicechecklist`.status !='Done'";
                              $result4=mysqli_query($con,$sql2);
                              $ros=mysqli_fetch_assoc($result4);
                      echo $ros['value_sum'];
                      ?>
                    </td>
                    <td><button class="btn-submit"><a href="adminAddPartsUsed.php?cID=<?php echo $row['checklistID'];?>&uID=<?php echo $row['UserID'];?>&bid=<?php echo $row['basicInspectionID'];?>">check out</a></button></td>
              </tr>
          <?php } ?>
        </tbody>
    </table>
  </center>
  <br><br>
	
  <form class="myform">			
  <center>
			<a href="adminHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a>
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