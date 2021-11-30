	<!-- MENU -->
	<div id='cssmenu'>
		<ul>
		   <li><a href='index.php?page=index_lokasi'>Master Lokasi</a></li>
		   <li><a href='index.php?page=index_user'>Pengontrol Lokasi</a></li>

		   <?php
		   if($lokasi == null){
		   }else{
		   	foreach($lokasi as $value){
		   ?>
		   <li><a href='index.php?page=index_kepala_pengontrol&lokasi=<?php echo $value['id_lokasi'] ?>&nama=<?php echo $value['nama_lokasi'] ?>'><?php echo $value['nama_lokasi'] ?></a></li>
		   <?php
			}
			}
		   ?>
		   <li><a href="index.php?page=history_pencatatan">History Pencatatan</a></li>
		   <li><a href="index.php?page=pencarian">Pencarian</a></li>
		   <li><a href="index.php?page=print" target="_blank">Print</a></li>
		</ul>
	</div>
	<!-- MENU -->