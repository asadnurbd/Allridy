<?php
	session_start();
	error_reporting("E-NOTICE");
?>
<header>
			<div class="wrapper">

				<h1 class="logo"> AllRidy</h1>
				<a href="#" class="hamburger"></a>
				<nav>
					<?php
						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
					?>
					<ul>

					  <li><a href="client_index.php">Rent Cars</a></li>
						<li><a href="client_hire_history.php">Hire History</a></li>
						<li><a href="message_admin.php">Message Admin</a></li>
					</ul>
	<a href="admin/logout.php">Logout</a>
					<?php
						} else{
					?>
							<ul>

								<li><a href="index.php">Home</a></li>
								<li><a href="#">View Status</a></li>
								<li><a href="#">Message Admin</a></li>

							</ul>



					<?php
						}
					?>
				</nav>
			</div>
		</header>
