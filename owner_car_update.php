<?php

	include './includes/config.php';
	$id = $_REQUEST['id'];
		$query = "SELECT image, car_name,car_type,hire_cost,capacity,from_date,to_date FROM cars WHERE car_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
  while($edit = mysqli_fetch_array($result, MYSQLI_BOTH)){
    $name = $edit['car_name'];
    $capacity = $edit['Capacity'];


	}

  $_SESSION['car_name']=$name;
  $_SESSION['Capacity']=$capacity;

}

						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"owner_car_update_form.php\")
									</script>";


?>
