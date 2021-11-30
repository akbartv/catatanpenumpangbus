<div id="container">
	<h3>
		<span style="float:right; line-height:2em;">Edit Data Pribadi</span>
		<a href="index.php?page=<?php echo ($_SESSION['level'] == 'kepala_pengontrol') ? 'index_kepala_pengontrol&message=welcome' : 'index_pencatatan' ?>">
			<i style="font-size:1.4em;" class="icon ion-ios-undo"></i>Kembali
		</a>
	</h3>
	<hr>

	<form method="post" action="index.php?page=update_data_pribadi">
		<?php foreach($data as $value){ ?>
		<input type="hidden" name="id" value="<?php echo $value['id_user'] ?>">

		<label>Username : </label><br>
		<input name="username" readonly type="text" value="<?php echo $value['username'] ?>"><br>

		<label>Nama User: </label><br>
		<input name="nama_user" type="text" value="<?php echo $value['nama_pengontrol'] ?>"><br>

		<label>Password Baru : </label><small style="float:right">Biarkan kosong jika tidak ingin mengganti password.</small><br>
		<input name="password" type="password" value=""><br> 

		<label>Konfirmasi Password Baru: </label><br>
		<input name="password2" type="password" value=""><br>
		
		<br>

		<button class="button blue"><i class="icon ion-android-checkmark-circle"></i>Simpan</button>
		<?php } ?>
	</form>
</div>