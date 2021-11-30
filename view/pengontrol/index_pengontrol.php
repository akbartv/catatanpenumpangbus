<?php
if (isset($_GET['message'])) {
	?>
	<div style="margin:1em; text-align:center;">
		<h1>Selamat Datang di</h1>
		<h1>Sistem Informasi Pencatatan Penumpang Bus</h1>
		<h1>PO. SAFARI</h1>
	</div>
	<?php
}else{
?>
<div id="container">
	<h3>Pencatatan</h3>
	<?php
	if (!isset($_GET['nama'])) {
		echo ($_GET['page'] == 'history_pencatatan') ? '<h4>History Pencatatan</h4>' : '';
	}else{
		echo '<h4>Lokasi : '.$_GET['nama'].'</h4>';
	}
	?>
	<hr>
	<table>
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>No. Polisi</th>
				<th>Nama Kru</th>
				<th>Jumlah Penumpang</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($data == null) {
				echo '<tr><td colspan="5" style="text-align:center;">Data tidak ditemukan.</td></tr>';
			}else{
			foreach($data as $key => $value){
			?>
			<tr>
				<td data-label="Tanggal"><?php echo $pencatatan->parseDate($value['tanggal']) ?></td>
				<td data-label="Jam"><?php echo $pencatatan->cutTime($value['jam']) ?></td>
				<td data-label="No. Polisi"><?php echo $value['no_polisi'] ?></td>
				<td data-label="Nama Kru"><?php echo $value['nama_kru'] ?></td>
				<td data-label="Jumlah Penumpang"><?php echo $value['jumlah_penumpang'] ?></td>
			</tr>
			<?php 
			}}
			?>
		</tbody>
	</table>
</div>
<?php } ?>