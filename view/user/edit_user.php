<div id="container">
	<h3>
		<span style="float:right; line-height:2em;">Edit Akun Pengontrol</span>
		<a href="index.php?page=index_user">
			<i style="font-size:1.4em;" class="icon ion-ios-undo"></i>Kembali
		</a>
	</h3>
	<hr>

	<form method="post" action="index.php?page=update_user">
		<?php foreach($data as $value){ ?>
		<input type="hidden" name="id" value="<?php echo $value['id_user'] ?>">

		<label>Username : </label><br>
		<input name="username" readonly type="text" value="<?php echo $value['username'] ?>"><br>

		<!-- <label>Password : </label><br>
		<input name="password" type="text" value=""><br> -->

		<!-- <label>Nama User: </label><br>
		<input name="nama_user" type="text" value="<?php echo $value['nama_pengontrol'] ?>"><br> -->

		<label>Lokasi : </label><br>
		<?php
		if ($lokasi->getDataLokasi() == null) {
			echo 'Data tidak ditemukan';
		}else{
		?>
		<select name="lokasi">
			<option value="0">-- Pilih Lokasi Pengontrol --</option>
			<?php
			foreach($lokasi->getDataLokasi() as $value2){
			?>
				<option <?php echo ($value['lokasi'] == $value2['id_lokasi']) ? 'selected' : '' ?> value="<?php echo $value2['id_lokasi'] ?>"><?php echo $value2['nama_lokasi'] ?></option>
				
			<?php
			}
			?>
		</select>
		<?php } ?>
		<br>

		<label>Status : </label><br>
		<select name="level">
			<option <?php echo ($value['level'] == 0) ? 'selected' : '' ?> value="0">-- Pilih Status Pengontrol --</option>
			<option <?php echo ($value['level'] == 'pengontrol_lokasi') ? 'selected' : '' ?> value="pengontrol_lokasi">Pengontrol Lokasi</option>
			<option <?php echo ($value['level'] == 'kepala_pengontrol') ? 'selected' : '' ?> value="kepala_pengontrol">Kepala Pengontrol</option>
		</select>
		<br>

		<button class="button blue"><i class="icon ion-android-checkmark-circle"></i>Simpan</button>
		<?php } ?>
	</form>
</div>