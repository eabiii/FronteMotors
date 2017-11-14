<?php
	include 'admincontent/adminheader.php';

?>
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
   margin-right:100px; 
   margin-left:100px;
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
	 margin-right:100px; 
   margin-left:100px;
    display: none;
    /*padding: 6px 12px;*/
    border-top: none;
}
#BVI{
	 overflow: hidden;
    border: 1px solid #ccc;
    background-color: #fff;
   margin-right:100px; 
   margin-left:100px;
}
.fluids{
	width:24.5%;
	height:250px;
	float:left;
	border: 1px solid #ccc;
	border-top: none;
	border-left: none;
}
.fluids h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
}
.fluids label{
	margin-left: 20px;
	margin-bottom: 5px;
}
.bAH{
	width:25%;
	height:250px;
	float:left;
	 border: 1px solid #ccc;
	 border-top: none;
}
.bAH h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
/*	margin-top: 11.550px !important;
	margin-bottom:13.550px !important;*/
}
.bAH label{
	margin-left: 20px;
	margin-bottom: 5px;
}
.others{
	width:25%;
	height:250px;
	float:left;
	 border: 1px solid #ccc;
	 border-top: none;
}
.others h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
/*	margin-top: 11.550px !important;
	margin-bottom:13.550px !important;*/
}
.others label{
	margin-left: 20px;
	margin-bottom: 5px;
}
.comments{
	width:25%;
	height:250px;
	float:left;
	 border: 1px solid #ccc;
	 border-right: none;
	 border-top: none;
}
.comments h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
/*	margin-top: 11.550px !important;
	margin-bottom:13.550px !important;*/
}
.comments label{
	margin-left: 20px;
	margin-bottom: 5px;
}
#Services{
	 overflow: hidden;
    border: 1px solid #ccc;
    background-color: #fff;
   margin-right:100px; 
   margin-left:100px;
}
.serviceInfo{
	width:100%;
	height:auto;
	float:left;
	 border: 1px solid #ccc;
	 border-top: none;
}
.serviceInfo h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
/*	margin-top: 11.550px !important;
	margin-bottom:13.550px !important;*/
}
.serviceInfo label{
	margin-left: 20px;
	margin-bottom: 5px;
}
.partsUsed{
		 overflow: hidden;
    border: 1px solid #ccc;
    background-color: #fff;

}
.partsUsed h3{
	border-bottom: 1px solid #000;
	padding-bottom: 5px;
/*	margin-top: 11.550px !important;
	margin-bottom:13.550px !important;*/
}
.partsUsed label{
	margin-left: 20px;
	margin-bottom: 5px;
}
.con1{
	width:100%;

}
.ser1{
	width:50%;
	height:150px;
	float:left;
	border-bottom: 1px solid #000;
	text-align: center;
	padding-top:25px;
}
.mec1{
	padding-top:25px;
	width:50%;	
	float:left;
	height:150px;
	text-align: center;
	border-bottom: 1px solid #000;
	/*border:1px solid #000;*/
}
</style>
<form class="myform" action="#" method="POST">
			<center><label><b><h2>Vehicle History</h2></b></label></center>
			<label><b>Select Vehicle:</b></label><br>
						<select name="plateNum"   id="car" class="inputvalues"	required>
								<option></option>
							<?php
								$query="SELECT * FROM vehicles";
								$query_run = mysqli_query($con,$query)or die("Error " . mysqli_error($con));
								$options="";

								while($row = $query_run->fetch_row()){
									echo "<option value='$row[0]'>$row[0]</option>";
								}					
							?>							
						</select>
				<br><br><br>		
				<center><a href="adminHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a></center>			
						
		</form>

		<div id="history">
			
		</div><br /> <br />
	
		<br /> <br />

		<footer>
			<div class="footer">
				<div id="footer_text">
					<center><br><br>This product is developed by Group8.</center>
					<center>Tatlong Bibe © 2017</center>
				</div>

			</div>			
		</footer>

<script>
			$(document).ready(function(){
				$("#car").change(function(){
					
					 var selectValue = $(this).find("option:selected").text();''
					 alert(selectValue);

					    $.ajax({
				 			url: 'vehicleHistory.php?plateNo='+selectValue,
						    success:function(output)
				            {
				                 $('#history').html(output); 	

				            }
				  });  
				})
			});
		</script>	
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
</html>