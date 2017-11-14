<?php
	include 'mechanicontent/mechanicheader.php';

?>

<form class="myform" action="#" method="POST">
			<center><label><b><h2>Vechile History</h2></b></label></center>
			<label><b>Select Vechile:</b></label><br>
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
						<label id="services"></label>

			<br><br><br>
			<center><a href="mechanicHomepageDes.php"><input type="button" id="btnBack" value="Back to Homepage"/></a></center>
			<br><br><br>
		</form>
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
				                 $('#services').html(output); 	

				            }
				  });  
				})
			});
		</script>		
</html>