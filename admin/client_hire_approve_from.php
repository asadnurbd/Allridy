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
          		$query = "SELECT a_status FROM hire WHERE hire_id = '$id'";
          	$result = $conn->query($query);

            while($edit = mysqli_fetch_array($result, MYSQLI_BOTH)){

            ?>





					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">



								<p>
									<span class="req">max 100 symbols</span>
									<label>Approve Status <span>(Approved=1, Pending=0 & Discarded=2)</span></label>
									<input type="" class="field size1" name="a_status" required value="<?php echo $edit['a_status']; ?>" />
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





                                $astatus=$_POST['a_status'];

                								$qr = "UPDATE hire SET a_status='$astatus' WHERE hire_id='$id'";
                								$res = $conn->query($qr);
                								if($res === TRUE){
                									echo "<script type = \"text/javascript\">
                											alert(\"Vehicle Succesfully Added\");
                											window.location = (\"client_requests.php\")
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
