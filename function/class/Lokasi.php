<?php

class Lokasi extends Core
{

	var $primary 	= 'id_lokasi'; // PENDEKLARASIAN VARIABEL PRIMARI KEY DARI SUATU TABEL
	var $table 		= 'tb_lokasi'; // PENDEKLARASIAN NAMA TABEL
	var $field 		= ['id_lokasi','nama_lokasi']; // PENDEKLARASIAN KOLOM DARI SUATU TABEL BERBENTUK ARRAY

	// MENGAMBIL SEMUA DATA DARI TABEL LOKASI
	public function getDataLokasi()
	{
		return $this->all($this->table);
	}

	// MENCARI / MENGAMBIL DATA DARI TABEL LOKASI BERDASARKAN ID LOKASI
	public function findDataLokasi($id)
	{
		return $this->find($this->table, 'id_lokasi', $id);
	}

	// MENGAMBIL NAMA LOKASI
	public function getNamaLokasi($id)
	{

		foreach ($this->findDataLokasi($id) as $value)
			return $value['nama_lokasi'];

	}

	// MENYISIPKAN DATA KE DALAM TABEL LOKASI
	public function insertLokasi($post)
	{

		$insert = $this->insert($this->table, $this->field, $this->init($post));
		if ($insert) {
			header("Location:index.php?page=index_lokasi");
		}else{

		}

	}

	// FUNGSI UNTUK MENGEDIT DATA LOKASI BERDASARKAN ID LOKASI
	public function editLokasi($id)
	{

		return $this->find($this->table, $this->primary, $id);

	}

	// MENGUPDATE DATA LOKASI
	public function updateLokasi($post)
	{
		// $set = $this->upd($post, $this->field, $this->primary);
		// $this->update($this->table, $set, $this->primary, )
		$set = $this->upd($post, $this->field, $this->primary);
		$update = $this->update($this->table, $set, $this->primary, current($post));
		if($update){

			header("Location:index.php?page=index_lokasi");

		}else{

		}

	}

	// MENGHAPUS DATA LOKASI
	public function deleteLokasi($id)
	{

		$delete = $this->delete($this->table, 'id_lokasi', $id);
		if ($delete) {

			header("Location:index.php?page=index_lokasi");

		}else{

		}

	}

}

?>