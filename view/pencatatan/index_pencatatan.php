<div id="container">
	<h3>Data Lokasi Pencatatan - <?php echo (isset($lokasi)) ? $lokasi : '' ?></h3>
	<hr>
	<div style="overflow:hidden;">
		<a href="index.php?page=input_pencatatan">
			<button style="width:49.5%; float:left" class="blue"><i class="icon ion-android-add"></i>Tambah Pencatatan</button>
		</a>
		<a href="index.php?page=cari_pencatatan">
			<button style="width:49.5%; float:right;" class="green"><i style="font-size:inherit" class="icon ion-android-search"></i>Cari Pencatatan</button>
		</a>	
	</div>		
	<br>
	<table>
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>No. Polisi</th>
				<th>Nama Kru</th>
				<th>Jumlah Penumpang</th>
				<th>Action</th>
			</tr>
		</thead>
	<?php
	if($data == null){
		echo '<tbody><tr><td colspan="6" style="text-align:center;">Data tidak ditemukan.</td></tr></tbody>';
	}else{
		foreach($data as $value){
	?>
			<tbody>
				<tr>
					<td data-label="Tanggal"><?php echo $pencatatan->parseDate($value['tanggal']) ?></td>
					<td data-label="Jam"><?php echo $pencatatan->cutTime($value['jam']) ?></td>
					<td data-label="No. Polisi"><?php echo $value['no_polisi'] ?></td>
					<td data-label="Nama Kru"><?php echo $value['nama_kru'] ?></td>
					<td data-label="Jumlah Penumpang"><?php echo $value['jumlah_penumpang'] ?></td>
					<td data-label="Action">
						<a href="index.php?page=edit_pencatatan&id_pencatatan=<?php echo $value['id_pencatatan'] ?>">
							<i class="icon ion-edit"></i>  
						</a>
						<a onclick="return confirm('Hapus data ini?')" href="index.php?page=delete_pencatatan&id=<?php echo $value['id_pencatatan'] ?>">
							<i class="icon ion-android-delete"></i>
						</a>
					</td>
				</tr>
			</tbody>
	<?php
		}
	}
	?>
	</table>
</div>