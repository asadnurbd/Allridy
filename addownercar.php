<?php
	include './includes/config.php';
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

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Vehicle Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_name" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Make <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_type" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Per day asking price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="hire_cost" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>From Date <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="from_date" placeholder="YYYY-MM-DD" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>TO Date <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="to_date" placeholder="YYYY-MM-DD" required />
								</p>

								<p>
									<span class="req">Current Images</span>
									<label>Vehicle Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required />
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>Vehicle Capacity<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="capacity" required />
								</p>

						</div>

						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" name="send" />
						</div>

					</form>
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
								$qr = "INSERT INTO cars (image, car_name,car_type,hire_cost,capacity,from_date,to_date,available,owner_id)
													VALUES ('$image','$car_name','$car_type','$hire_cost','$capacity','$from_date','$to_date','0','$current_id ')";
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
