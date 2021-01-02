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
						<li><a href="index.php">Home</a></li>
						<li><a href="about_us.php">About</a></li>
						<li><a href="Contacts.php">Contact</a></li>
					</ul>
					<a href="clientlog.php">Client Login</a>
					<a href="alogin.php">Admin Login</a>
					<a href="ownerlog.php">owner Login</a>
					<?php
						} else{
					?>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="#">View Status</a></li>
								<li><a href="#">Message Admin</a></li>

							</ul>
					<a href="admin/logout.php">Logout</a>
					<?php
						}
					?>
				</nav>
			</div>
</header>
