<div id="container">
	<h3>Daftar Akun Pengontrol</h3>
	<hr>
	<a href="index.php?page=input_user">
		<button class="blue"><i class="icon ion-android-add"></i>Tambah User</button>
	</a>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Nama Pengontrol</th>
				<th>Lokasi</th>
				<th>Jabatan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($data == null){

				echo '<tr><td colspan="5" style="text-align:center;">Data tidak ditemukan.</td></tr>';

			}else{
			foreach($data as $value){
			?>
			<tr>
				<td data-label="Username"><?php echo $value['username'] ?></td>
				<td data-label="Nama Pengontrol"><?php echo $value['nama_pengontrol'] ?></td>
				<td data-label="Lokasi">
				<?php
			
				echo ($value['lokasi'] != null) ? $lokasi->getNamaLokasi($value['lokasi']) : '';
				?>
				</td>
				<td data-label="Jabatan" style="text-transform:capitalize;"><?php echo str_replace('_', ' ', $value['level']) ?></td>
				<td data-label="Action">
					<a href="index.php?page=edit_user&id=<?php echo $value['id_user'] ?>">
						<i class="icon ion-edit"></i>  
					</a>
					
					<a onclick="return confirm('Hapus data ini?')" href="index.php?page=delete_user&id=<?php echo $value['id_user'] ?>">
						<i class="icon ion-android-delete"></i>
					</a>
				</td>
			</tr>
			<?php
			}
			}
			?>
		</tbody>
	</table>
</div>