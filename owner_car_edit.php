
<?include 'includes/config.php';?>
<?php
	session_start();

	error_reporting("E-NOTICE");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to delete this car?")){
				window.location.href ='Owner_car_delete.php?id='+id;
			}
		}
	</script>

  <script type="text/javascript">
		function edit(id){
			if(confirm("Are you sure you want to update this car?")){
				window.location.href ='owner_car_update_form.php?id='+id;
			}
		}
	</script>
</head>
<body>
	<header>
  			<div class="wrapper">
  				<h1 class="logo"> AllRidy</h1>
  				<a href="#" class="hamburger"></a>
  				<nav>
  					<?php
  						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
  					?>
  					<ul>
  						<li><a href="index.php">Home</a></li>
  						<li><a href="index.php">Rent Cars</a></li>
  						<li><a href="about_us.php">About</a></li>
  						<li><a href="Contacts.php">Contact</a></li>
  					</ul>
  					<a href="clintlog.php">Client Login</a>
  					<a href="alogin.php">Admin Login</a>
  					  <a href="ownerlog.php">owner Login</a>
  					<?php
  						} else{
  					?>
  							<ul>
  								<li><a href="welcomeowner.php">Home</a></li>

  								<li><a href="addownercar.php">Add Owner Vehicles</a></li>
									<li><a href="owner_car_edit.php">Edit Vehicles</a></li>
  							</ul>
  					<a href="admin/logout.php">Logout</a>
  					<?php
  						}
  					?>
  				</nav>
  			</div>
  		</header>
<!-- Header -->
<div id="header">
	<div class="shell">


		</div>
		<!-- End Main Nav -->
	</div>
</div>

<div id="container">
	<div class="shell">

   <h1>Owner car management</h1>

		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
           <h1>Welcome ( <?php 	  echo $_SESSION['fname']; ?>)</h1>
					<!-- Box Head -->


					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th>Vehicle Make</th>
								<th>Car Type</th>
								<th>Hire Price</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include './includes/config.php';
                	session_start();
                $current_id=$_SESSION['owner_id'];
								$select = "SELECT * FROM cars WHERE owner_id =$current_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td></td>
								<td><h3><a href="#"><?php echo $row['car_type'] ?></a></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td><a href="#"><?php echo $row['hire_cost'] ?></a></td>
								<td><a href="javascript:edit(<?php echo $row['car_id'];?>)" class="ico del">Edit</a></td>
							</tr>
							<?php
								}
							?>
						</table>

						<!-- Pagging -->
						<div class="pagging">
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
								<a href="#">Previous</a>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">245</a>
								<span>...</span>
								<a href="#">Next</a>
								<a href="#">View all</a>
							</div>
						</div>
						<!-- End Pagging -->

					</div>


				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->

			<!-- Sidebar -->
			<div id="sidebar">

				<!-- Box -->

				<!-- End Box -->
			</div>
			<!-- End Sidebar -->

			<div class="cl">&nbsp;</div>
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->



</body>
</html>
