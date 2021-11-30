<?php
session_start();
/**
* 
*/
class User extends Core
{
	
	var $primary 	= 'id_user'; // PENDEKLARASIAN VARIABEL PRIMARI KEY DARI SUATU TABEL
	var $table 		= 'tb_pengontrol'; // PENDEKLARASIAN NAMA TABEL
	var $field 		= ['id_user','username', 'password', 'nama_pengontrol', 'lokasi', 'level'];  // PENDEKLARASIAN KOLOM DARI SUATU TABEL BERBENTUK ARRAY

	// FUNGSI PENGECEKAN SETELAH USER MEMASUKAN USERNAME DAN PASSWORD
	public function doLogin($input)
	{

		$username = $input['username'];
		$password = $input['password'];
		
		$query = "select * from tb_pengontrol where username='$username' and password='".$password."'";
		$result = $this->con->query($query);
		$data = $result->fetch_assoc();
		if ($result->num_rows == 1) {
			// kalau username dan password sudah terdaftar di database
			// buat session dengan nama username dengan isi nama user yang login
			$_SESSION['username'] = $username;
			$_SESSION['id_pengontrol'] = $data['id_user'];
			$_SESSION['nama'] = $data['nama_pengontrol'];
			$_SESSION['level'] = $data['level'];
			$_SESSION['id_lokasi'] = $data['lokasi'];
			
			// redirect ke halaman users [menampilkan semua users]
			if($_SESSION['level'] == 'pengontrol_lokasi'){

				header('location:index.php?page=index_pencatatan');

			}elseif($_SESSION['level'] == 'kepala_pengontrol'){

				header('location:index.php?page=index_kepala_pengontrol&message=welcome');

			}else{

				header('location:login.php?error=4');

			}
		} else {
			// kalau username ataupun password tidak terdaftar di database
			header('location:login.php?error=4');
		}

	}

	// FUNGSI PENGECEKAN APAKAH SESSION USER SUDAH DIBUAT
	public static function logCheck()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			header("Location:login.php");
		} else {
			$logged_in = true;
		}
		
	}

	// FUNGSI LOGOUT
	public function logout()
	{
		session_destroy();
		header("Location:login.php");
	}


//////////////////////////////////////////////////////////////////////////////////////////////////////

	// MENGAMBIL SEMUA DATA USER
	public function getDataUser()
	{

		return $this->all($this->table);

	}

	// MENYISIPKAN DATA USER KE DALAM TABEL
	public function insertUser($post)
	{

		$insert = $this->insert($this->table, $this->field, $this->init($post));
		if ($insert) {
			header("Location:index.php?page=index_user");
		}else{
			header("Location:index.php?page=input_user");
		}

	}

	// MENGAMBIL DATA USER BERDASARKAN ID USER
	public function editUser($id)
	{

		return $this->find($this->table, $this->primary, $id);

	}

	// MENGUPDATE / MEMPERBARUI DATA USER
	public function updateUser($post)
	{

		$update = $this->raw_write('UPDATE '.$this->table.' SET lokasi="'.$post['lokasi'].'", level="'.$post['level'].'" WHERE '.$this->primary.'="'.$post['id'].'"');
		if($update)
		{
			header("Location:index.php?page=index_user");
		}else{
			header("Location:index.php?page=edit_user&id=".$post['id']);
		}

	}

	// MENGUPDATE / MEMPERBARUI DATA PRIBADI SETELAH LOGIN KE DALAM SISTEM
	public function updateDataPribadi($post)
	{

		if($post['password'] == null && $post['password2'] == null){

			$password = '';

		}else{

			if ($post['password'] == $post['password2']) {
				
				$password = ', password="'.$post['password2'].'"';

			}else{

				header("Location:index.php?page=edit_data_pribadi");

			}

		}

		$update = $this->raw_write('UPDATE '.$this->table.' SET nama_pengontrol="'.$post['nama_user'].'"'.$password.' WHERE '.$this->primary.'="'.$post['id'].'"');
		if($update)
		{

			if ($_SESSION['level'] == 'pengontrol_lokasi') {

				header("Location:index.php?page=index_pencatatan");

			}elseif($_SESSION['level'] == 'kepala_pengontrol'){

				header("Location:index.php?page=index_kepala_pengontrol&message=welcome");

			}

		}else{

			header("Location:index.php?page=edit_data_pribadi");

		}

	}

	// MENGHAPUS DATA USER
	public function deleteUser($id)
	{

		$delete = $this->delete($this->table, 'id_user', $id);
		if($delete){
			header("Location:index.php?page=index_user");
		}

	}

}

?>