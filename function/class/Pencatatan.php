<?php

class Pencatatan extends Core{

	var $primary 	= 'id_pencatatan'; // PENDEKLARASIAN VARIABEL PRIMARI KEY DARI SUATU TABEL
	var $table 		= 'tb_pencatatan'; // PENDEKLARASIAN NAMA TABEL
	var $field 		= ['id_pencatatan', 'id_user', 'id_lokasi', 'tanggal','jam','no_polisi','nama_kru', 'jumlah_penumpang'];  // PENDEKLARASIAN KOLOM DARI SUATU TABEL BERBENTUK ARRAY

	// MENGAMBIL SEMUDA DATA PENCATATAN
	public function getPencatatan()
	{

		return $this->all($this->table, 'order by tanggal desc');

	}

	// MENGAMBIL DATA PENCATATAN BERDASARKAN LOKASI
	public function getPencatatanByLokasi()
	{

		return $this->find($this->table, 'id_lokasi', $_SESSION['id_lokasi'], 'order by tanggal desc');

	}

	// MENGAMBIL DATA PENCATATAN BERDASARKAN LOKASI YANG DIPILIH
	public function getDataPencatatanBySelectedLokasi($lokasi)
	{

		return $this->find($this->table, 'id_lokasi', $lokasi, 'order by tanggal desc');

	}

	// MENGAMBIL HISTORY PENCATATAN
	public function getHistoryPencatatan()
	{

		return $this->all($this->table, 'order by tanggal desc');		

	}

	// MENGAMBIL DATA PENCATATAN UNTUK DI PRINT
	public function getPrint($id)
	{

		return $this->raw("SELECT tb_pengontrol.nama_pengontrol, tb_pencatatan.* FROM tb_pencatatan INNER JOIN tb_pengontrol ON tb_pencatatan.id_user = tb_pengontrol.id_user where tb_pencatatan.id_lokasi=$id");	

	}

	// MENCARI DATA BERDASARKAN FORM YANG DI INPUT
	public function searchPencatatan($input)
	{

		return $this->raw("select * from $this->table where tanggal like '%".$this->parseDate($input['search'])."%' order by tanggal desc");

	}

	// MENCARI DATA BERDASARKAN FORM YANG DI INPUT
	public function searchPencatatan2($input)
	{
		
		return $this->raw("select * from $this->table where id_lokasi = '".$_SESSION['id_lokasi']."' and tanggal like '%".$this->parseDate($input['search'])."%' order by tanggal desc");

	}

	// MENYISIPKAN DATA KEDALAM TABEL
	public function insertPencatatan($post)
	{
		$insert = $this->insert($this->table, $this->field, $this->init($post));

		if ($insert == true) {

			header("Location:index.php?page=index_pencatatan");

		}else{

			echo 'gagal';

		}
		
	}

	// MENGAMBIL DATA PENCATATAN BERDASARKAN ID PENCATATAN
	public function editPencatatan($id)
	{

		return $this->find($this->table, $this->primary, $id);

	}

	// MENGUPDATE DATA PENCATATAN
	public function updatePencatatan($post)
	{		
		
		$set = $this->upd($post, $this->field, $this->primary);
		$update = $this->update($this->table, $set, $this->primary, current($post));
		if($update){

			header("Location:index.php?page=index_pencatatan");

		}else{
			echo 'gagal';
		}

	}

	// MENGAPUS DATA PENCATATAN
	public function deletePencatatan($id)
	{

		$delete = $this->delete($this->table, $this->primary, $id);

		if ($delete == true) {

			header("Location:index.php?page=index_pencatatan");

		}else{

		}

	}

}

?>