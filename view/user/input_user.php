<div id="container">
	<h3>
		<span style="float:right; line-height:2em;">Input Akun Pengontrol</span>
		<a href="index.php?page=index_user">
			<i style="font-size:1.4em;" class="icon ion-ios-undo"></i>Kembali
		</a>
	</h3>
	<hr>

	<form method="post" action="index.php?page=insert_user">

		<input type="hidden" name="id" value="">

		<label>Username : </label><br>
		<input name="username" type="text" value=""><br>

		<label>Password : </label><br>
		<input name="password" type="text" value="123456"><br>

		<label>Nama User: </label><br>
		<input name="nama_user" type="text" value=""><br>

		<label>Lokasi : </label><br>
		<?php
		if ($lokasi->getDataLokasi() == null) {
			echo 'Data tidak ditemukan';
		}else{
		?>
		<select name="lokasi">
			<option value="0">-- Pilih Lokasi Pengontrol --</option>
			<?php
			foreach($lokasi->getDataLokasi() as $value){
			?>
				<option value="<?php echo $value['id_lokasi'] ?>"><?php echo $value['nama_lokasi'] ?></option>
				
			<?php
			}
			?>
		</select>
		<?php } ?>
		<br>

		<label>Jabatan : </label><br>
		<select name="level">
			<option value="0">-- Pilih Jabatan --</option>
			<option value="pengontrol_lokasi">Pengontrol Lokasi</option>
			<option value="kepala_pengontrol">Kepala Pengontrol</option>
		</select>
		<br>

		<button class="button blue"><i class="icon ion-android-checkmark-circle"></i>Simpan</button>

	</form>
</div>