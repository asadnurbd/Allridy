<?php
	include './includes/config.php';
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
          		$query = "SELECT image, car_name,car_type,hire_cost,capacity,from_date,to_date FROM cars WHERE car_id = '$id'";
          	$result = $conn->query($query);

            while($edit = mysqli_fetch_array($result, MYSQLI_BOTH)){

            ?>





					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">



								<p>
									<span class="req">max 100 symbols</span>
									<label>Vehicle Name  <span>(Required Field)</span></label>
									<input type="" class="field size1" name="car_name" required value="<?php echo $edit['car_name']; ?>" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Make <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_type" required value="<?php echo $edit['car_type']; ?>" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Per day asking price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="hire_cost" required value="<?php echo $edit['hire_cost']; ?>" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>From Date <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="from_date" placeholder="YYYY-MM-DD" required value="<?php echo $edit['from_date']; ?>" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>TO Date <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="to_date" placeholder="YYYY-MM-DD" required value="<?php echo $edit['to_date']; ?>" />
								</p>

								<p>
									<span class="req">Current Images</span>
									<label>Vehicle Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required  value="<?php echo $edit['image']; ?>"/>
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>Vehicle Capacity<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="capacity" required value="<?php echo $edit['capacity']; ?>"/>
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

								$target_path = "./cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){

								$image = basename($_FILES['image']['name']);
								$car_name = $_POST['car_name'];
								$car_type = $_POST['car_type'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
								$from_date = $_POST['from_date'];
							  $to_date = $_POST['to_date'];
										session_start();
                   $current_id = $_SESSION['owner_id'];
								$qr = "UPDATE cars SET car_name='$car_name', car_type='$car_type', hire_cost='$hire_cost', capacity='$capacity', from_date='$from_date', to_date='$to_date', image='$image' WHERE car_id='$id'";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"welcomeowner.php\")
											</script>";
									}
								}
								else 'Failed';
							}
						?>
				</div>

			</div>


			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>


</body>
</html>
