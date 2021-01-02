
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

	<section class="search">
		<div class="wrapper">
			<form action="#" method="post">

				<input type="submit" id="submit_search" name="submit_search"/>
			</form>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>

		<div class="advanced_search">
			<div class="wrapper">
				<span class="arrow"></span>
				<form action="#" method="post">
					<div class="search_fields">
						<input type="text" class="float" id="check_in_date" name="check_in_date" placeholder="Check In Date"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="text" class="float" id="check_out_date" name="check_out_date" placeholder="Check Out Date"  autocomplete="off">
					</div>
					<div class="search_fields">
						<input type="text" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="text" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
					</div>
					<input type="text" id="keywords" name="keywords" placeholder="Keywords"  autocomplete="off">
					<input type="submit" id="submit_search" name="submit_search"/>
				</form>
			</div>
		</div><!--  end advanced search section  -->
	</section><!--  end search section  -->


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				<h3 style="text-decoration: underline">Make Payments Here</h3>

				<form method="post">
					<table>
						<tr>
							<td style=" color:white">Nexus Pay Transaction ID:</td>
							<td><input type="text" name="npay" required></td>
						</tr>
						<tr>
							<td style=" color:white">From Date:</td>
							<td><input type="text" name="fdate" placeholder="YYYY-MM-DD" required></td>
						</tr>
						<tr>
							<td style=" color:white"><?php


						//  echo 	$_SESSION['client_id'];
						//	echo 	$_GET['id'];



							 ?>To Date:</td>
							<td><input type="text" name="tdate"  placeholder="YYYY-MM-DD" required></td>
						</tr>

						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Submit Details"></td>
						</tr>
					</table>


				</form>



				<!-- for car information and find offer ammount -->
				<?php
					include 'includes/config.php';
				$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
				$rs = $conn->query($sel);
				$rws = $rs->fetch_assoc();

				$oid=$rws['o_id'];
				$hcost=$rws['hire_cost'];
        $carid=$rws['car_id'];

				 $s = "SELECT * FROM offer WHERE o_id='$oid'";
				 $r = $conn->query($s);
				 $rws1 = $r->fetch_assoc();
				 $oam=$rws1['ammount'];
  	      session_start();

          $clientid= $_SESSION['client_id'];
					$to=($oam*$hcost)/100;
					$tc=$hcost-$to;



						if(isset($_POST['pay'])){
							include 'includes/config.php';
							$npay= $_POST['npay'];
							$fdate=$_POST['fdate'];
							$tdate=$_POST['tdate'];




							$qry = "INSERT INTO hire (car_id,client_id,from_date,to_date,o_id,transaction_no, total_cost) VALUES('$carid','$clientid','$fdate', '$tdate', '$oid', '$npay', '$tc')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Payment Successfully Done. Wait for Admin Approval\");
											window.location = (\"wait.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
							}
						}

					  ?>


						!-- for car information and find offer ammount -->
			</ul>



		</div>
	</section>	<!--  end listing section  -->
