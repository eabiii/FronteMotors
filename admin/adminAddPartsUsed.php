<?php

	include 'admincontent/adminheader.php';
	$checklistID=$_GET['cID'];
	$userID=$_GET['uID'];
	$bid=$_GET['bid'];
$sql = "select * from `car parts` ";
$result = mysqli_query($con, $sql) or die("Error " . mysqli_error($con));
?>

 <form class="myform" action="adminFunctionToInvoice.php" method="POST">
			
				<label><b><h2>Add Parts Used</h2></b></label><br>

				<center>
					<input type="hidden" name="checklistID" value="<?php echo $checklistID;?>"/>
					<input type="hidden" name="userID" value="<?php echo $userID;?>"/>
					<input type="hidden" name="bid" value="<?php echo $bid;?>"/>

	                <div class="form-group">  
	                    
	                          <div class="table-responsive">  
	                          	<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
	                               <table class="table table-bordered" id="dynamic_field" > 
	                               <tr>
	                               		<th>Parts</th>
	                               		<th>Quantity</th>
	                               		<th>Price</th>
	                               </tr> 
	                                    <tr>  
	                                         <td>
	                                         	<select class="inputvalues2" name="parts[]" id="services">
	                                         			<?php while($row = mysqli_fetch_array($result)) { ?>
															<option value="<?php echo $row['partID']; ?>"><?php echo $row['partName']; ?></option>
														<?php } ?>
	                                         	</select>
	                                         </td> 
	                                         <td>
	                                         <input type="text" name="quantity[]" placeholder="Quantity" required class="inputvalues2" />
	                                         </td>
	                                         <td>
	                                         <input type="text" name="price[]" placeholder="Price" required class="inputvalues2" />
	                                         </td>
	                                        
	                                    </tr>  
	                               </table>  
	                                 
	                          </div>  
	                           <div class="form-group" id="addHere"></div> 
	                      
	                </div>
	                 
	                <br><br><br>
					<input name="submit_btn" type="submit" id="submit_btn" value="Submit"/><br><br>
					
					<a href="adminAddTransaction.php"><input type="button" id="btnBack" value="Go Back"/></a>

				</center>


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
 	var counters=1;
      $('#add').click(function(){  
      		   var newTextBoxDiv = $(document.createElement('div'))
    	    			 .attr("id", 'TextBoxDiv' + counters);
    
    	    			newTextBoxDiv.after().html('<div class="table-responsive"><table class="table table-bordered" id="dynamic_field" style="margin-left:12px;"><tr> <td><select class="inputvalues2" name="parts[]" id="parts'+counters+'"></select></td><td><input type="text" name="quantity[]" placeholder="Quantity" required class="inputvalues2" /></td><td> <input type="text" name="price[]" id="price" placeholder="Price" required class="inputvalues2" /></td><td><button type="button"  id="removeButton2'+counters+'" class="btn btn-danger" disabled="disabled"> X </button></td> </tr> </table> </div>');
    	    			newTextBoxDiv.appendTo("#addHere");
				 	$.ajax({
				 			url: 'selectparts.php',
						    success:function(output)
				            {
				                 $('#parts'+counters).html(output); 	
				                 $('#removeButton2'+counters).removeAttr('disabled');	
				                 counters++;
				            }
				  });
					 // 	$( "#parts"+counters ).change(function() {
					 // 		var partID=$("#parts"+counters).val("val2").change();

						//   alert(partID);
						// });
				 	//  $("#parts"+counters).live("change", function() {
				 	//  	var partID=$("#parts"+counters).val($(this).find("option:selected").attr("value"));
				 	//  $.ajax({
				 	// 		url: 'viewprice.php?partID='+partID,
						//     success:function(output)
				  //           {
				  //                $('#price'+counters).html(output); 	
				  //                $('#removeButton2'+counters).removeAttr('disabled');	
				  //                counters++;
				  //           }
				  // });
				 	//  	});
				 	 
				   
				  $('#removeButton2'+counters).click(function () {
					if(counters==1){
				       	 location.reload();
				          return false;
				     }else{
				     	counters--;

				        $('#TextBoxDiv' + counters).remove();
				     }

					
				});   
      });

       
 }); 

 </script>
</html>
