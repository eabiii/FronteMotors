<?php
require '../config.php';
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$time=date('h:i:s');
				//if the button Confirm Register is clicked
				if(isset($_POST['submit_btn'])){
					$checklistID=$_POST['checklistID'];
					$userID=$_POST['userID'];
					$basicInspectionID=$_POST['bid'];
				foreach($_POST["parts"] as $k=>$v){
				$parts = $v;
	  			$quantity = $_POST["quantity"][$k];
	 			$price=$_POST["price"][$k];
	 			$total=$price * $quantity;

	  $sql="INSERT INTO partsDetails (checklistID,partID,amountPerItem,quantity,total) VALUES ($checklistID,$parts,'$price','$quantity','$total') ";
	  $result=mysqli_query($con,$sql)or die("Error " . mysqli_error($con));
	 
	  if($result)
	  {
	  			$query="SELECT * FROM  vehicles WHERE ownerID='".$userID."'";
	  			 $result2=mysqli_query($con,$query);
	  			 $row=mysqli_fetch_assoc($result2);
	  			 $query2="UPDATE `basic vehicle inspection` SET dateOut='".$date."',timeOut='".$time."' WHERE plateNo='".$row['plateNo']."'";
	  			 $result3=mysqli_query($con,$query2);
	  			 $query2="UPDATE `servicechecklist` SET status='Done', timeOut='".$time."' WHERE basicInspectionID='".$basicInspectionID."'";
	  			 $result3=mysqli_query($con,$query2);
	  			 $query3="SELECT SUM(total)  AS value_sum FROM `partsdetails`
						INNER JOIN  `servicechecklist` ON `partsdetails`.checklistID = `servicechecklist`.checklistID 
						WHERE `partsdetails`.checklistID='".$checklistID."' AND status='Done'";
	  			 $result4=mysqli_query($con,$query3);
	  			 $row=mysqli_fetch_assoc($result4);
	  			 $query4="UPDATE `servicechecklist` SET partsPrice='".$row['value_sum']."' WHERE checklistID='".$checklistID."'";
	  			 $result5=mysqli_query($con,$query4);
	  		session_start();
			$_SESSION['userid'] = $userID;
			$_SESSION['checklistID'] = $checklistID;
	 		echo "<script> alert('Your invoce has been generated');</script>";
	 			// echo "<script>window.open(,'_blank')</script>";
	 		echo "<script>window.location.href = 'adminCheckOutInvoice.php?userid=".$userID."&checklistID=".$checklistID."';</script>";
	  	
	   
	  }else{
	  	echo "<script>alert('error');</script>";
	  }
 
	}
}
?>