<?php
	session_start();
	require '../config.php';
?>
<html>
<head>
	<link href='../assets/css/style.css' rel='stylesheet'>
	<link href='../assets/css/design.css' rel='stylesheet'>

	<title>Fronte Motos, Inc.</title>
</head>	
<body>	
	<center>
		<img src="../assets/images/fronte.png" height="210" width="530" class="avatar"/>
	</center>
<ul>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Customer</a>
    <div class="dropdown-content">
        		<a href="mechanicAddCustomer.php">Add Customer</a>
				<a href="mechanicRegisterVehicle.php">Register Vehicle</a>
				<a href="mechanicCheckConfirmations.php">Check Confirmations</a>
				<a href="mechanicViewAll.php">View All</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Service</a>
    <div class="dropdown-content">
        		<a href="mechanicAddTransaction.php">Add Transaction</a>
			<a href="mechanicUpdateServices.php">Update Sevices</a>
				<a href="mechanicVehicleHistory.php">Vehicle History</a>
				<a href="mechanicAddService.php">Add New Service</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Problem</a>
    <div class="dropdown-content">
        		<a href="mechanicAddProblem.php">Add Problem</a>
				
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Reports</a>
    <div class="dropdown-content">
    	<!--
        	<a href="mechanicReport-salesService.php">Service Sales</a>
			<a href="mechanicReport-carParts.php">Car Parts</a>
		-->
			<a href="mechanicReport-carProblems.php">Car Problems</a>
			<a href="mechanicReport-topCustomers.php">Top Customers</a>
		<a href="mechanicReport-mostAvailedServices.php">Most Availed Services</a>
    </div>
  </li>
</ul>


		<!-- 
		<li><a>Reports</a>
			<ul>
				<li><a href="mechanicReport-salesService.php">Service Sales</a></li>
				<li><a href="mechanicReport-carParts.php">Car Parts</a></li>
				<li><a href="mechanicReport-carProblems.php">Car Problems</a></li>
				<li><a href="mechanicReport-topCustomers.php">Top Customers</a></li>
				<li><a href="mechanicReport-mostAvailedServices.php">Most Availed Services</a></li>					
			</ul>		
		</li>
	</ul>
	</div> -->