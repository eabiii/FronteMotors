<?php
	include 'admincontent/adminheader.php';
	$biID=$_SESSION['checklistID'];
	$timein=$_SESSION['timeIn'];

	foreach($_POST["services"] as $k=>$v){

	  $service = $v;
	  $mechanic = $_POST["mechanic"][$k];
	  $price=$_POST["price"][$k];
	  $status="not confirm";


	  $sql="INSERT INTO servicechecklist (basicInspectionID,mechanicID,serviceID,timeIn,price,status) VALUES ($biID,$mechanic,$service,'$timein',$price,'$status') ";
	  $result=mysqli_query($con,$sql)or die("Error " . mysqli_error($con));


	}
	echo "<script>alert('Service with mechanic inserted.');</script>";
 	
?>
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    margin-left:50px;
    margin-right:50px;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
.input[type="text"]
{
	background-color:transparent !important;
}
</style>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
	<center><label><b><h2>Confirm Transaction</h2></b></label></center>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'info')">Information</button>
  <button class="tablinks" onclick="openCity(event, 'fluids')">Fluids</button>
  <button class="tablinks" onclick="openCity(event, 'hoses')">Belt And Hoses</button>
  <button class="tablinks" onclick="openCity(event, 'services')">Services</button>
  <button class="tablinks" onclick="openCity(event, 'others')">Others</button>
</div>
<div class="confirmtransac">
				
				
			
	             
<?php
	$query="SELECT * FROM `basic vehicle inspection` WHERE `basic vehicle inspection`.basicInspectionID='".$biID."'";
	$results=mysqli_query($con,$query)or die("Error " . mysqli_error($con));

	while($row = mysqli_fetch_assoc($results)) {

    
?>

	<div  id="info" class="info tabcontent" >
	<center><h3>Information:</h3></center>
	<label>Basic Inspection  ID:</label> <input type="text"  readonly="readonly" value="<?php echo $row['basicInspectionID'];?>"></br> 
	<label>Plate No:</label><input type="text"  readonly="readonly" value="<?php echo $row['plateNo'];?>"></br> 
	
	<label>Branch:</label><input type="text" readonly="readonly"  value="<?php echo $row['branch'];?>"></br> 
	<label>Date In And Time In:</label><input type="text" readonly="readonly" class="dates"  value="<?php echo $row['dateIn'].",".$row['timeIn'];?>"></br>
	</div>

	<div id="fluids" class="fluids tabcontent">
        <center>
                <h3>Fluids:</h3>
                <h3>Legend:</h3>
                <h3>F= Full L= Low G= Good R= Replace</h3>
        </center>
	<label>Oil:</label><input type="text"  readonly="readonly" value="<?php echo $row['oil'];?>"></br>
	<label>Brakes:</label><input type="text"  readonly="readonly" value="<?php echo $row['brakes'];?>"></br>
	<label>Coolant:</label><input type="text"  readonly="readonly" value="<?php echo $row['coolant'];?>"></br>
	<label>MT/AT:</label><input type="text"  readonly="readonly" value="<?php echo $row['MT/AT'];?>"></br>
	<label>Steering:</label><input type="text"  readonly="readonly" value="<?php echo $row['steering'];?>"></br>
	</div>

	<div id="hoses" class="hoses tabcontent">
        <center>
                <h3>Belts & Hoses :</h3>
                <h3>Legend:</h3>
                <h3>F= Full L= Low G= Good R= Replace</h3>
        </center>
	<label>Aircon:</label><input type="text"  readonly="readonly" value="<?php echo $row['aircon'];?>"></br>
	<label>Alternator:</label><input type="text"  readonly="readonly" value="<?php echo $row['alternator'];?>"></br>
	<label>Power Steering:</label><input type="text"  readonly="readonly" value="<?php echo $row['powerSteering'];?>"></br>
	<label>Fuel Hose:</label><input type="text"  readonly="readonly" value="<?php echo $row['fuelHose'];?>"></br>
	<label>Radiator Hose:</label><input type="text"  readonly="readonly" value="<?php echo $row['radiatorHose'];?>"></br>
	</div>
	<div id="others" class="others tabcontent">
	   <center>
        <h3>Others:</h3>
        <h3>Legend:</h3>
        <h3>F= Full L= Low G= Good R= Replace</h3>
       </center>
	<label>Battery test:</label><input type="text"  readonly="readonly" value="<?php echo $row['batteryTest'];?>"></br>
	<label>Brake Pads:</label><input type="text"  readonly="readonly" value="<?php echo $row['brakePads'];?>"></br> 
	<label>Air Cleaner:</label><input type="text"  readonly="readonly" value="<?php echo $row['airCleaner'];?>"></br>
	<label>Tires:</label><input type="text"  readonly="readonly" value="<?php echo $row['tires'];?>"></br>     
	</div>


<?php
}
?>
</div>
<div  id="services" class="service tabcontent">
     <center><label><b><h2>Services</h2></b></label>
	 <table>
	 	<thead>
	 		<th>Mechanic</th>
	 		<th>Service</th>
	 		<th>Price</th>
	 		<th>Status</th>
	 	</thead>
	 	<tbody>
<?php
$querys="SELECT * FROM `servicechecklist`  
		INNER JOIN  `usertb` ON `servicechecklist`.mechanicID = `usertb`.UserID
		INNER JOIN  `services`  ON `servicechecklist`.serviceID = `Services`.serviceID
		WHERE basicInspectionID='".$biID."'";
	$result2=mysqli_query($con,$querys)or die("Error " . mysqli_error($con));

	while($row = mysqli_fetch_assoc($result2)) {
?>
	<tr>
		<td><?php echo $row['Firstname']." ".$row['Lastname']; ?></td>
		<td><?php echo $row['serviceName']; ?></td>
		<td><?php echo $row['price']; ?></td>
		<td><?php echo $row['status']; ?></td>
	</tr>
	 
<?php
}
?>	 
	</tbody>
</table>    
	</div> 
	</center> 
</div>	<br /> <br /> <br />            
<center><a href="adminHomepageDes.php"><button class="btn-success" style="font-size: 20px !important; width:250px;">Done</button></a></center>
</html>   
 <!-- Print here the:<br>
		                Basic Vehicle Inspection<br>
		                Services to render and price<br>
		                Mechanics assigned<br>
		                <br>
		                If go back, allow the user to edit the fields in the pages.<br>
		                Inputs shold be editable (kinda hassle yeah but nasa guidelines po kasi :( <br>
		                <br>
		                If confirm, irecord na po tong transaction. -->