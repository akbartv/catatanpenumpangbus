<div id="container">
	<h3>
		<span style="float:right; line-height:2em;">Edit Pencatatan</span>
		<a href="index.php?page=index_pencatatan">
			<i style="font-size:1.4em;" class="icon ion-ios-undo"></i>Kembali
		</a>
	</h3>
	<hr>
	<form action="index.php?page=update_pencatatan" method="post">
		<?php foreach($data as $value){ ?>
		<input name="id" type="hidden" value="<?php echo $value['id_pencatatan'] ?>">
		<input name="id_pengontrol" type="hidden" value="<?php echo $value['id_user'] ?>">

		<label>Lokasi Pencatatan : </label><br>
		<input type="text" readonly value="<?php echo ($lokasi != null) ? $lokasi : ''; ?>"><br>
		<input name="id_lokasi" type="hidden" value="<?php echo $_SESSION['id_lokasi'] ?>">

		<label>Tanggal : </label><small class="hint">Format-tanggal : dd/mm/yyyy</small>
		<br>
		<input name="tanggal" type="text" onkeyup="addDateSeparator(event,this,'dd/mm/yyyy')" placeholder="Contoh : 31/12/2000" value="<?php echo $pencatatan->parseDate($value['tanggal']) ?>"/><br>

		<label>Jam : </label><small class="hint">Format-jam : 24 Jam</small>
		<br>
		<input name="jam" type="text" id="jam" placeholder="Contoh : 23:59" value="<?php echo $pencatatan->cutTime($value['jam']) ?>"><br>

		<label>No. Polisi : </label><br>
		<input name="nopolis" type="text" placeholder="Contoh : H 1234 XX" value="<?php echo $value['no_polisi'] ?>"><br>

		<label>Nama Kru : </label><br>
		<input  name="kru" type="text" value="<?php echo $value['nama_kru'] ?>"><br>

		<label>Jumlah Penumpang : </label><br>
		<input name="penumpang" type="text" class="numeric" value="<?php echo $value['jumlah_penumpang'] ?>"><br><br>

		<button class="button blue"><i class="icon ion-android-checkmark-circle"></i>Simpan</button>
		<!-- <button class="button red"><i class="icon ion-trash-a"></i>Batal</button>
		<button class="button green"><i class="icon ion-edit"></i>Edit</button> -->
		<?php } ?>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#jam').timeEntry({show24Hours: true});
	$("input.numeric").numeric();
});
</script>