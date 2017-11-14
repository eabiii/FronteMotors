<?php
require '../config.php';
$partID=$_GET['partID'];
$sql = "SELECT * FROM `car parts` WHERE partID='".$partID."'";
$result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
      echo "<option value='".$row['partID']."'>".$row['partName']."</option>";

    }
mysqli_free_result($result);


?>
