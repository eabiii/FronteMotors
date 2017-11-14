<?php
	session_start();
	require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fronte Motos, Inc.</title>
		<link rel="stylesheet" href="assets/css/login.css">
	</head>

	<body>
		<div id="main_container">
			<div id="header">
				<div id="logo">
					Fronte Motors, Inc.
				</div>

				<div class="login_form">
					<form  class="myform" action="login.php" method="post">
						<table>
							<tbody>
								<tr>
									<td>Username: </td><td>Password: </td>
								</tr>
								<tr>
									<td><input type="text" class="inputvalues" name="username" required></td>
									<td><input type="password" class="inputvalues" name="password" required></td>
									<td><input type="submit" name="login_btn" value="Log In"></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>

			<div id="body_section">
				    <section id="pic1">
				      <div class="container">
				        
				      </div>
				    </section>				
			</div>

		</div>

			    <section id="main">
			      <div class="container">
			        <article id="main-col">
			          <h1 class="page-title">About Us</h1>

			          <center><img src="assets/images/pic2.jpg" class="pic2"/></center>


			          <p>
			            Fronte Motor Parts, Inc. is a retail and auto-repair business for vehicles located in 23B Kabignayan St. Cor Banawe St., Banawe Quezon City. We have a 3 floor building for their store, office, and warehouse. Our store is located in the first floor of their building. 
			            <br>
			            <br>
			            The business was established in 1984 in Banawe, Quezon City which is our main office as of now. The founders of the business are Christian Tan, Marivic Tan, and Jun Vitun. At this current time, we sell different parts for different kinds of vehicles as well as different vehicle accessories.

			          </p>
			          <p>
			            <h3>What We Do</h3>

			            <center><img src="assets/images/pic3.jpg" class="pic3"/></center>

			            <p>
			            We cater all aspects of auto repairs and preventive maintenance services for major brands and types of vehicles at reasonable costs. We also sell different car parts at our retail store. That is why we are now fast becoming the number one choice and are preferred by motorists over their car dealers. 
			            <br>
			            <br>
			            Aside from that, we also sell our products online through Lazada, an ecommerce site. With additional freight charge, Fronte Motor Parts, Inc. can ship items nationwide, subject to terms and condition.
			            </p>
			          </p>


			        </article>

			        <aside id="sidebar">
			          <div class="dark">
			            <h3>Contact Us:</h3>
			           <center><img src="assets/images/pic4.jpg" class="pic4"/></center>
			            <p>
			            	<center><h5>
			            	23-B Kabignayan corner Banawe Streets, Quezon City<br>
							Fronte Contact Number(s):<br>
							+632 712-0864, +632 712-0919, +632 731-1788</h5>
							</center>
			            </p>
			          </div>
			        </aside>
			      </div>
			    </section>	

			<div class="footer">
				<div id="footer_text">
					<center><br><br>This product is developed by Group8.</center>
					<center>Tatlong Bibe © 2017</center>
				</div>

			</div>	

	</body>