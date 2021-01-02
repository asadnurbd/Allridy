<?php
	include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<div id="header">
	<div class="shell">

		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">

		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Driver Information
		</div>

		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<div class="box-head">
						<h2>Driver Information</h2>
					</div>

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">
								<p>

									<label> Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="d_name" required />
								</p>
								<p>

									<label>NID Number: <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="d_nid" required />
								</p>
								<p>

									<label>Phone Number: <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="phone" required />
								</p>

								<p>

									<label>Address: <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="d_addr" required />
								</p>
                <p>

                  <label>Sex: <span>(Required Field)</span></label>
                  <input type="text" class="field size1" name="gender" required />
                </p>

                <p>

                  <label>Driving License Number: <span>(Required Field)</span></label>
                  <input type="text" class="field size1" name="d_licence" required />
                </p>



						</div>

						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" name="send" />
						</div>

					</form>
					<?php
							if(isset($_POST['send'])){






								$d_name = $_POST['d_name'];
								$d_nid = $_POST['d_nid'];
								$phone = $_POST['phone'];
								$d_addr= $_POST['d_addr'];
                $gender= $_POST['gender'];
              	$d_licence= $_POST['d_licence'];

								$qr = "INSERT INTO driver (d_name,d_nid, phone, d_addr, gender, d_licence)
													VALUES ('$d_name','$d_nid', '$phone', '$d_addr', '$gender', '$d_licence')";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Driver Succesfully Added\");
											window.location = (\"index.php\")
											</script>";
									}

								else 'Failed';
							}
						?>
				</div>

			</div>

			<div id="sidebar">

			
					</div>
				</div>
			</div>

			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>



</body>
</html>
