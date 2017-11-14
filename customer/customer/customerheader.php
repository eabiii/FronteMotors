<?php
	session_start();
	require '../config.php';
  $userid=$_SESSION['userid'];
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
    <a href = "customerAnnounce.php">Announcements</a>
  </li>
   <li class="dropdown">
   <a href = "customerNotification.php" >Notifications</a>
  </li>
   <li class="dropdown">
    <a href = "customerVehicleHistory.php" >Car History</a>
  </li>
   <li class="dropdown">
    <a href = "customerInquiries.php" >Inquire</a>
  </li>
   <li class="dropdown">
    <a href = "customerInbox.php" >Inbox</a>
  </li>  
</ul>