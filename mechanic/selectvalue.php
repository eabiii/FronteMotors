<?php
require '../config.php';
$sql = "SELECT * FROM services";
$result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
      echo "<option value='".$row['serviceID']."'>".$row['serviceName']."</option>";

    }
mysqli_free_result($result);


?>
