<html>
<head>
	<title>Sistem Informasi Pencatatan Penumpang Bus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

	<link media="all" type="text/css" rel="stylesheet" href="assets/img/icon/ionicons-2.0.1/css/ionicons.min.css">

	<!-- Time Entry -->	
	<script type="text/javascript" src="assets/js/time-entry/jquery.plugin.js"></script>
	<script type="text/javascript" src="assets/js/time-entry/jquery.timeentry.js"></script>

	<!-- Numeric -->
	<script type="text/javascript" src="assets/js/numeric/jquery.numeric.js"></script>
	<script type="text/javascript" src="assets/js/numeric/jquery.numeric.min.js"></script>
</head>
<body>
<!-- HEADER -->
<div>
	<ul class="mul">
		<li class="mult one"></li>
		<li class="mult two"></li>
		<li class="mult three"></li>
		<li class="mult four"></li>
		<li class="mult five"></li>
	</ul>
</div>
<header>
	<img src="assets/img/logo/safari.png" width="30%">
</header>
<!-- END HEADER -->

<!-- CONTENT -->
<section id="content">
	<div id="login-container">
		<form action="login.php?page=auth" method="post">
			<input autofocus type="text" name="username" placeholder="Username"><br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<button class="blue"><i class="icon ion-log-in"></i>Masuk</button>
		</form>
		<?php 
		include "function/class/route.php"; 
		$page = (isset($_GET['page']))? $_GET['page'] : "main";
		route($page);
		?>
	</div>
</section>
<!-- END CONTENT -->

<!-- FOOTER -->
<footer>
	<small>
		Copyright &copy; 2015 - PO. Safari
	</small>
</footer>
<!-- END FOOTER -->
</body>
</html>