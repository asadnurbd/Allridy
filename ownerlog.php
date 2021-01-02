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
		session_start();
		error_reporting("E-NOTICE");
	?>
	<!--	////////////////////////////////////////////////////////////////////////////////////////////            header start -->

	<?php
	include"header.php";
	 ?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Where you need us, when you need us</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
	</section><!--  end hero section  -->


	<section class="search">
		<div class="wrapper">
		<div id="fom">
			<form method="post">
			<h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:underline">owner Login Area</h3>
				<table height="100" align="center">
					<tr>
						<td>Email Address:</td>
						<td><input type="email" name="email" placeholder="Enter Email Address" required></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" placeholder="Enter Password " required></td>
					</tr>
					<tr>
						<td><input type="submit" name="log" value="Login Here"></td>
						<td style="text-align:right;"><a href="ownersign.php">Sigup Here</a></td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['log'])){
					include 'includes/config.php';

					$uname = $_POST['email'];
					$pass = $_POST['pass'];



					$qy = "SELECT * FROM owners WHERE email = '$uname' AND pass = '$pass'";
					$log = $conn->query($qy);
					$num = $log->num_rows;
					$row = $log->fetch_assoc();
					if($num > 0){
						session_start();
						$sessionSql = " SELECT owner_id,fname FROM owners WHERE ( email='".$uname."' AND pass='".$pass."') ";
            $sessionQury = mysqli_query($conn, $sessionSql);
						while($sessionResult = mysqli_fetch_array($sessionQury, MYSQLI_BOTH)){
							 $owner_id = $sessionResult['owner_id'];
							 $owner_name = $sessionResult['fname'];

						}
						$_SESSION['email'] = $row['email'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['owner_id']=$owner_id;
						$_SESSION['fname']=$owner_name;




						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"welcomeowner.php\")
									</script>";
					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"ownerlog.php\")
									</script>";
					}
				}

			?>


	</section><!--  end search section  -->
</body>

</html>
