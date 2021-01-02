
<?include 'includes/config.php';?>
<?php
	session_start();

	error_reporting("E-NOTICE");
?>


<html lang="en">
<head>
<title>Contacts</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/css/drowpdown.css">
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<style media="screen">

</style>
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
  								<li><a href="index.php">Home</a></li>
  								<li><a href="#">Message Admin</a></li>
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

 <h1>Welcome( <?php 	  echo $_SESSION['fname']; ?>)</h1>
   <section class="listings">






     <div class="wrapper">


       <ul class="properties_list">

       <?php

             include 'includes/config.php';



        $current_id = $_SESSION['owner_id'];
             $sel = "SELECT * FROM cars WHERE owner_id =$current_id";
             $rs = $conn->query($sel);

             while($rws = $rs->fetch_assoc()){
       ?>

         <li>

           <a href="#?id=<?php echo $rws['car_id'] ?>">

             <img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
           </a>
	          <span class="price"><?php echo 'Taka.'.$rws['hire_cost'];?></span>
           <div class="property_details">
             <h1>
               <a href="#?id=<?php echo $rws['car_id'] ?>"><?php echo 'Car Make>'.$rws['car_type'];?></a>
             </h1>
             <h2>Car Name/Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
						 <h2>Capacity: <span class="property_size"><?php echo $rws['capacity'];?></span></h2>

					<?php if ($row['available']==0): ?>
												 	 <h2>Availablity: <span class="property_size"><?php echo "No";?></span></h2>
					<?php else: ?>
							 <h2>Availablity: <span class="property_size"><?php echo "Yes";?></span></h2>
					<?php endif; ?>

           </div>
         </li>
       <?php
         }
       ?>
       </ul>
     </div>
   </section>	<!--  end listing section  -->








</body>
</html>
