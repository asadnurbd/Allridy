
<?php
	session_start();

	error_reporting("E-NOTICE");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<section class="">
		<?php
			include 'client_header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
	</section><!--  end hero section  -->


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'includes/config.php';
						$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
						$rs = $conn->query($sel);
						$rws = $rs->fetch_assoc();
						$co_id=$rws['o_id'];
			?>






				<li>
					<a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'Taka.'.$rws['hire_cost'];?></span>

					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Car Make>'.$rws['car_type'];?></a>
						</h1>
						<h2>Car Name/Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
						<h2>Capacity: <span class="property_size"><?php echo $rws['capacity'];?></span></h2>


						<h2>Availablity: <span class="property_size"><?php echo "Yes bd";?></span></h2>
					</div>

				</li>
				<?php
				include 'includes/config.php';


				$select1 = "SELECT ammount
						FROM offer
						WHERE o_id=$co_id";

				$result1 = $conn->query($select1);
				$q = $result1->fetch_assoc();



				$to=($q['ammount']*$rws['hire_cost'])/100;
				$tc=$rws['hire_cost']-$to;
				 ?>



				 <h4>OFFER Available:<span><?php  echo $q['ammount'] ."%";?><span><h4>
				<h5> Car Hire cost : <span class="property_size"><?php echo $rws['hire_cost'];?></span></h5>
				<h5> Total Cost After Discount : <span class="property_size"><?php echo $tc?></span></h5>
				<h3>Proceed to Hire <?php echo $rws['car_name'];?>. </h3>
					<a href="pay.php?id=<?php echo $rws['car_id']; ?>">Click to Book</a>






					</div>
				</li>

			</ul>
			</div>
			</section>	<!--  end listing section  -->

			<!--  end listing section  -->
			</body>
			</html>
