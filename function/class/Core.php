<?php
require_once '/config/database.php';


class Core{

	// KONSTRUKTOR SEBAGAI PENGHUBUNG KE DALAM DATABASE
	public function __construct()
	{
		$this->con = Database::connect();
	}

	// PENGINIALISASIAN ATAU PEMETAAN DARI FORM INPUT || DIKHUSUSKAN UNTUK INSERT
	public function init($post)
	{
		$data = [];
		foreach($post as $key => $val){
			$data[] = ($key == 'tanggal') ? "'".$this->parseDate($val)."'" : "'".$val."'";
		}
		return implode(', ', $data);
	}

	// FUNGSI UTAMA UNTUK MENYISIPKAN DATA KE DALAM DATABASE
	public function insert($tbl, $field, $value)
	{
		$sql = "INSERT INTO $tbl(".implode(', ', $field).") VALUES($value)";

		if ($this->con->query($sql) === TRUE) {

		    return true;

		} else {

		    return false;

		}
	}

	// FUNGSI UTAMA UNTUK MENGUPDATE DATA KE DALAM DATABASE
	public function update($tbl, $set, $ident, $id)
	{

		$sql = "UPDATE $tbl SET $set WHERE $ident=$id";

		if ($this->con->query($sql) === TRUE) {
		    
			return true;

		} else {
		    
			return false;

		}

	}

	// FUNGSI UTAMA UNTUK MENAMPILKAN SEMUA DATA DARI TABEL YANG DIPILIH
	public function all($tbl, $prop = '')
	{
		$sql = "SELECT * FROM $tbl $prop";

		$result = $this->con->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc())

		        $data[] = $row;

		        return $data;
		    

		} else {

		    return null;

		}
	}

	// FUNGSI UTAMA UNTUK MENCARI DATA DARI SUATU TABEL DENGAN PARAMETER YANG DITENTUKAN
	public function find($tbl, $ident, $id, $prop = '')
	{
		$sql = "SELECT * FROM $tbl WHERE $ident='$id' $prop";

		$result = $this->con->query($sql);

		if ($result->num_rows > 0) {

		    // output data of each row
		    while($row = $result->fetch_assoc()) 

		        $data[] = $row;

		        return $data;
		    

		} else {

		    return null;

		}
	}

	// FUNGSI UTAMA PENGAMBILAN DATA DARI SUATU TABEL DENGAN PERINTAH SQL YANG SUDAH DITENTUKAN SEBELUMNYA
	public function raw($state)
	{

		$sql = "$state";

		$result = $this->con->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) 

		        $data[] = $row;

		        return $data;
		    

		} else {

		    return false;

		}

	}

	// FUNGSI UTAMA PENULISAN DATA KE DALAM TABEL DENGAN PERINTAH SQL YANG SUDAH DITENTUKAN SEBELUMNYA
	public function raw_write($query)
	{

		$sql = "$query";

		if ($this->con->query($sql) === TRUE) {
		    
			return true;

		} else {
		    
			return false;

		}

	}

	// FUNGSI UTAMA UNTUK MENGHAPUS DATA DARI SUATU TABEL
	public function delete($table, $ident, $id)
	{

		$sql = "DELETE FROM $table WHERE $ident=$id";

		if ($this->con->query($sql) === TRUE) {
		    return true;
		} else {
		    return false;
		}

	}

	// FUNGSI UNTUK PENERJEMAAHAN FORMAT TANGGAL
	public function parseDate($date = '')
	{
		$tanggal = $date;
        $num = ['1','2','3','4','5','6','7','8','9','0'];
        $temp = str_replace($num, 'f', $tanggal);

        switch ($temp) {
        	case 'ff/ff/ffff':
        		$tmp_tgl = explode('/', $tanggal);
        		$fin_tgl = $tmp_tgl[2].'-'.$tmp_tgl[1].'-'.$tmp_tgl[0];
        		break;
        	case 'f/ff/ffff':
        		$tmp_tgl = explode('/', $tanggal);
        		$fin_tgl = $tmp_tgl[2].'-'.$tmp_tgl[1].'-0'.$tmp_tgl[0];
        		break;
        	case 'ff/f/ffff':
        		$tmp_tgl = explode('/', $tanggal);
        		$fin_tgl = $tmp_tgl[2].'-0'.$tmp_tgl[1].'-'.$tmp_tgl[0];
        		break;
        	case 'f/f/ffff':
        		$tmp_tgl = explode('/', $tanggal);
        		$fin_tgl = $tmp_tgl[2].'-0'.$tmp_tgl[1].'-0'.$tmp_tgl[0];
        		break;
        	case 'ffff-ff-ff':
        		$tmp_tgl = explode('-', $tanggal);
        		$fin_tgl = $tmp_tgl[2].'/'.$tmp_tgl[1].'/'.$tmp_tgl[0];
        		break;
        	default:
				$fin_tgl = false;
				break;
        }

        return $fin_tgl;
	}

	// FUNGSI UNTUK FORMAT PENULISAN JAM DARI TIPE DATA TIME
	public function cutTime($time = '')
	{

		return substr($time, 0,5);
		
	}

	// PENGINIALISASIAN ATAU PEMETAAN DARI FORM INPUT || DIKHUSUSKAN UNTUK UPDATE
	public function upd($post, $field, $primary)
	{

		$r = array_combine($field, $post);
		$d = [];
		foreach($r as $key => $value){
			$d[$key] = ($key == 'tanggal') ? $key."='".$this->parseDate($value)."'" : $key."='".$value."'";
		}
		unset($d[$primary]);
		return implode(', ', $d);

	}

}

?>