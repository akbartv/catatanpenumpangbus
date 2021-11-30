<div id="container">
	<h3>
		<span style="float:right; line-height:2em;">Edit Lokasi</span>
		<a href="index.php?page=index_lokasi">
			<i style="font-size:1.4em;" class="icon ion-ios-undo"></i>Kembali
		</a>
	</h3>
	<hr>
	<form method="post" action="index.php?page=update_lokasi">
		<?php 
		foreach($data as $value){
		?>
		<label>Nama Lokasi : </label>
		<input type="hidden" name="id" value="<?php echo $value['id_lokasi'] ?>">
		<input type="text" name="lokasi" value="<?php echo $value['nama_lokasi'] ?>" autofocus><br>
		<button class="button blue"><i class="icon ion-android-checkmark-circle"></i>Simpan</button>
		<?php 
		}
		?>
	</form>
</div>