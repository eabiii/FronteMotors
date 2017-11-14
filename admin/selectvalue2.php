<?php
require '../config.php';
	$sql = "SELECT * FROM usertb WHERE Type='3' ";
$result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
      echo "<option value='".$row['UserID']."'>".$row['Firstname'].",".$row['Lastname']."</option>";

    }
mysqli_free_result($result);
?>
