<?php
	session_start();
  $userid=$_SESSION['userid'];
	require '../config.php';
?>
<html>
<head>
	<link href='../assets/css/style.css' rel='stylesheet'>
	<link href='../assets/css/design.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

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
        		<a href="adminAddCustomer.php">Add Customer</a>
				<a href="adminRegisterVehicle.php">Register Vehicle</a>
				<a href="adminCheckConfirmations.php">Check Confirmations</a>
				<a href="adminAnnounce.php">Make Announcement</a>
				<a href="adminPMCustomer.php">Compose Message</a>
				<a href="adminInbox.php">Customer Inquires</a>
				<a href="adminViewAll.php">View All</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Mechanic</a>
    <div class="dropdown-content">
        		<a href="adminAddMechanic.php">Add Mechanic</a>
				<a href="adminRemoveMechanic.php">Remove Mechanic</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Service</a>
    <div class="dropdown-content">
        		<a href="adminAddTransaction.php">Add Transaction</a>
				<a href="adminUpdateServices.php">Update Sevices</a>
				<a href="adminVehicleHistory.php">Vehicle History</a>
				<a href="adminAddService.php">Add New Service</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Problem</a>
    <div class="dropdown-content">
        <a href="adminAddProblem.php">Add Problem</a>
				
    </div>
  </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Reports</a>
    <div class="dropdown-content">
        	<a href="adminReport-salesService.php">Service Sales</a>
			<a href="adminReport-carParts.php">Car Parts</a>
			<a href="adminReport-carProblems.php">Car Problems</a>
			<a href="adminReport-topCustomers.php">Top Customers</a>
		<a href="adminReport-mostAvailedServices.php">Most Availed Services</a>
    </div>
  </li>
</ul>
	