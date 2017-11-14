<?php
	require 'config.php';
		if(isset($_POST['login_btn']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			//query
			$query="select * from usertb WHERE Username='$username' AND Password='$password'";
			$query_run = mysqli_query($con,$query);

			if($query_run)
			{
				$row=mysqli_fetch_assoc($query_run);
					$type=$row["Type"];
					$Firstname=$row["Firstname"];
					$Lastname=$row["Lastname"];
					

						if($type == "1")
						{
								session_start();
						         $_SESSION['userid'] = $row['UserID'];
         						header("location: admin/adminHomepageDes.php");
						}
						else if($type == "2")
						{
							session_start();
							   $_SESSION['userid'] = $row['UserID'];
         						header("location: customer/customerHomepageDes.php");
						}
						else if($type == "3")
						{
							session_start();
							  $_SESSION['userid'] = $row['UserID'];
         						header("location: mechanic/mechanicHomepageDes.php");
						}else{
							echo "<script>alert('Your Username or Password is Incorrect');</script>";
							echo "<script>window.location='index.php';</script>";
						}
			}else{
				echo mysql_error();
			}
	}	
?>