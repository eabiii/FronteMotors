<?php
require '../config.php';
$plate=$_GET['plateNo'];

$sql = "SELECT * FROM `basic vehicle inspection`
INNER JOIN servicechecklist ON `basic vehicle inspection`.basicInspectionID=`servicechecklist`.basicInspectionID
WHERE `basic vehicle inspection`.plateNo='".$plate."'";

$result = mysqli_query($con, $sql)or die("Error " . mysqli_error($con));
$count	= mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result)) {
	 ?>
	 <label>basicInspectionID:</label><?php echo $row['basicInspectionID'];?>
<?php
    }
mysqli_free_result($result);


?>
