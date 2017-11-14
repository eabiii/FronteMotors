<?php
require '../config.php';
$basicInspectionID=$_GET['bid'];
$query2="UPDATE `servicechecklist` SET status='on progress' WHERE basicInspectionID='".$basicInspectionID."'";
$result3=mysqli_query($con,$query2);
 if($result3)
 {
 	header('Location:customerHomepageDes.php');
 }
?>