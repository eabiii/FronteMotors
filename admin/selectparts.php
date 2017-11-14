<?php
require '../config.php';
$sql = "SELECT * FROM `car parts`";
$result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
      echo "<option value='".$row['partID']."'>".$row['partName']."</option>";

    }
mysqli_free_result($result);


?>
