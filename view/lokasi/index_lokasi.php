<div id="container">
	<h3>Daftar Lokasi</h3>
	<hr>
	<a href="index.php?page=input_lokasi">
		<button class="blue"><i class="icon ion-android-add"></i>Tambah Lokasi</button>
	</a>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Lokasi</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($data == null){
				echo '<tr><td colspan="3" style="text-align:center;">Data tidak ditemukan.</td></tr>';
			}else{
			$no = 1;
			foreach ($data as  $value) {
			?>
			<tr>
				<td data-label="No"><?php echo $no++ ?></td>
				<td data-label="Nama Lokasi"><?php echo $value['nama_lokasi'] ?></td>
				<td data-label="Action">
					<a href="index.php?page=edit_lokasi&id=<?php echo $value['id_lokasi'] ?>">
						<i class="icon ion-edit"></i>  
					</a>
					
					<a onclick="return confirm('Hapus data ini?')" href="index.php?page=delete_lokasi&id=<?php echo $value['id_lokasi'] ?>">
						<i class="icon ion-android-delete"></i>
					</a>
				</td>
			</tr>
			<?php
			}}
			?>
		</tbody>
	</table>
</div>