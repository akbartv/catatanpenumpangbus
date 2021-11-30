<?php
 include 'function/class/route.php'; 
 User::logCheck();
?>
<!DOCTYPE html>
<head>
	<title>Sistem Informasi Pencatatan Penumpang Bus</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

	<!-- Menu -->
	<script type="text/javascript" src="assets/js/menu/script.js"></script>
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
	<div style="float:right; font-size:0.8em">
		<?php echo $_SESSION['nama']; ?> | 
		<u><a href="index.php?page=edit_data_pribadi">Edit Data Pribadi</a></u> | 
		<u><a href="index.php?page=logout">Logout</a></u>
	</div>
</header>
<!-- END HEADER -->

<!-- CONTENT -->
<section id="content">	
	<?php
	$page = (isset($_GET['page']))? $_GET['page'] : "main";
	menu();
	route($page);
	?>
</section>
<!-- END CONTENT -->

<!-- FOOTER -->
<footer>
	<small>
		Copyright &copy; 2015 - PO. Safari
	</small>
</footer>
<!-- END FOOTER -->

 <script type="text/javascript">
function addDateSeparator(e, control, format){
       
        this.Format = format;
        var keycode = (e.which) ? e.which : event.keyCode              
       
        if (keycode > 31 && (keycode < 48 || keycode > 57)){
                return false;
        }else{
        
                var DateFormatPattern = /^dd\/mm\/yyyy$|^mm\/dd\/yyyy$|^mm\/dd\/yyyy$|^yyyy\/mm\/dd$/;
                if ( DateFormatPattern.test(this.Format) ){
               
                        var SplitFormat = this.Format.split("/");
                        if ( control.value.length  >= this.Format.length ){
                       
                                if ( keycode !=8){
                                        return false;
                                }
                        }
                        if ( control.value.length == SplitFormat[0].length ){
                       
                                if ( keycode !=8){
                                        control.value += '/';
                                }
                        }
                        if ( control.value.length == (SplitFormat[1].length + SplitFormat[0].length +1) ){
                       
                                if ( keycode !=8){
                                        control.value += '/';
                                }
                        }
                }else{
                        alert("Supplied date format parameter is incorrect.");
                }
        }
}</script>
</body>
</html>