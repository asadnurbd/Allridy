<?php
	include '../includes/config.php';
  session_start();

  error_reporting("E-NOTICE");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>

	</div>
</div>

<div id="container">
	<div class="shell">



		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<div class="box-head">
						<h2>Add New Vehicles</h2>
					</div>
          <?php


          	include './includes/config.php';
          	$id = $_REQUEST['id'];
          		$query = "SELECT available,o_id FROM cars WHERE car_id = '$id'";
          	$result = $conn->query($query);

            while($edit = mysqli_fetch_array($result, MYSQLI_BOTH)){

            ?>





					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">



								<p>
									<span class="req">max 100 symbols</span>
									<label>Availability  <span>(Available=1 & Not Available=0)</span></label>
									<input type="" class="field size1" name="available" required value="<?php echo $edit['available']; ?>" />
								</p>
								<p>
									<span class="req">max 100 symbols</span>
									<label>Offer Id:  <span>(No offer=0)</span></label>
									<input type="" class="field size1" name="o_id" required value="<?php echo $edit['o_id']; ?>" />
								</p>


						</div>

						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="update" name="send" />
						</div>

					</form>
          <?php
            }
          ?>
					<?php
							if(isset($_POST['send'])){





                                $available=$_POST['available'];
																$o_id=$_POST['o_id'];
                										session_start();
                                   $current_id = $_SESSION['owner_id'];
                								$qr = "UPDATE cars SET available='$available',o_id='$o_id' WHERE car_id='$id'";
                								$res = $conn->query($qr);
                								if($res === TRUE){
                									echo "<script type = \"text/javascript\">
                											alert(\"Vehicle Succesfully Added\");
                											window.location = (\"add_vehicles.php\")
                											</script>";
                									}
                								}
                								else 'Failed';

						?>
				</div>

			</div>


			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>


</body>
</html>
