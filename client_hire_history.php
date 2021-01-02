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
				<h2 class="caption" style="text-align:center">Where you need us, when you need us</h2>
				<h3 class="properties" style="text-align: center">Toyota- BMW -Bentley</h3>
			</section>
	</section><!--  end hero section  -->
	<section class="listings">





		<div class="wrapper">


			<ul class="properties_list">

			<?php
      include 'includes/config.php';
        session_start();
      $ci=	$_SESSION['client_id'];





						$sel = "SELECT * FROM hire WHERE client_id=$ci";
						$rs = $conn->query($sel);

						while($rws = $rs->fetch_assoc()){
			?>

				<li>



					<div class="property_details">

						<h1>Hire ID: <span class="property_size"><?php echo $rws['hire_id'];?></span></h1>
						<h2>From Date: <span class="property_size"><?php echo $rws['from_date'];?></span></h2>
						<h2>To Date: <span class="property_size"><?php echo $rws['to_date'];?></span></h2>
						<h2>Nexus Pay Transaction Number:<span class="property_size"><?php echo $rws['transaction_no'];?></span></h2>
  <?php if ($rws['a_status']==1): ?>
    		<h1>Approve Status: <span class="property_size"><?php echo "Approved";?></span></h1>

  <?php elseif($rws['a_status']==0):?>

  <h1>Approve Status: <span class="property_size"><?php echo "Pending";?></span></h1>

<?php else:?>
    <h1>Approve Status: <span class="property_size"><?php echo "Discarded";?></span></h1>
  <?php endif; ?>

					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

	<!--  end listing section  -->
</body>
</html>
