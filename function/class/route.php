<?php
	require_once 'function/bootstrap.php';

	// FUNGSI UNTUK MENAMPILKAN MENU
	function menu()
	{
		if($_SESSION['level'] == 'kepala_pengontrol'){
			$data_lokasi = new Lokasi();
			$lokasi = $data_lokasi->getDataLokasi();
			include "view/menu.php";
		}else{

		}
	}

	// FUNGSI UNTUK PENGALIHAN HALAMAN
	function route($page)
	{
		// PEMANGGILAN CLASS UNTUK MASING MASING TABEL
		$user 		= new User();
		$lokasi 	= new Lokasi();
		$pencatatan = new Pencatatan();
		
		if($page == 'auth'){

			// FUNGSI UNTUK PENGECEKAN USER SETELAH MENGISI FORM LOGIN
			$user->doLogin($_POST);

		}else{

			if($_SESSION != null){

			////////////////////////////////////////////////////

				// JIKA SESSION LEVEL USER BERISI PENGONTROL LOKASI MAKA HALAMAN INI YANG HANYA BISA DIAKSES
				if($_SESSION['level'] == 'pengontrol_lokasi'){

					switch ($page) {
						
						case 'index_pencatatan':

								$lokasi = $lokasi->getNamaLokasi($_SESSION['id_lokasi']);
								$data = $pencatatan->getPencatatanByLokasi();
								include "view/pencatatan/index_pencatatan.php";

							break;

						case 'input_pencatatan' :

								$lokasi = $lokasi->getNamaLokasi($_SESSION['id_lokasi']);
								include "view/pencatatan/input_pencatatan.php";

							break;

						case 'insert_pencatatan' :
								
								$pencatatan->insertPencatatan($_POST);

							break;

						case 'edit_pencatatan':
							
								$data = $pencatatan->editPencatatan($_GET['id_pencatatan']);
								$lokasi = $lokasi->getNamaLokasi($_SESSION['id_lokasi']);
								include "view/pencatatan/edit_pencatatan.php";

							break;

						case 'update_pencatatan':
								
								$pencatatan->updatePencatatan($_POST);

							break;

						case 'delete_pencatatan':
							
								$pencatatan->deletePencatatan($_GET['id']);

							break;

						case 'cari_pencatatan':

									include "view/search.php";

							break;

						case 'search_input':

									$data = $pencatatan->searchPencatatan2($_POST);
									include "view/search.php";

							break;

						case 'edit_data_pribadi':

									$data = $user->editUser($_SESSION['id_pengontrol']);
									include "view/user/edit_user_pengontrol.php";

							break;

						case 'update_data_pribadi':

									$user->updateDataPribadi($_POST);

							break;

						case 'logout':

								$user->logout();

							break;
						
						default:

							# code...

							break;

					}

				// JIKA SESSION LEVEL USER BERISI KEPALA PENGONTROL MAKA HALAMAN INI YANG HANYA BISA DIAKSES
				}elseif($_SESSION['level'] == 'kepala_pengontrol'){

					switch ($page) {

						case 'index_kepala_pengontrol':

									if(isset($_GET['lokasi'])){

										$data = $pencatatan->getDataPencatatanBySelectedLokasi($_GET['lokasi']);

									}else{

										$data = null;

									}

									include "view/pengontrol/index_pengontrol.php";

							break;

						case 'history_pencatatan':
							
							$data = $pencatatan->getPencatatan();
							include "view/pengontrol/index_pengontrol.php";

							break;

						case 'pencarian':

									include "view/search.php";

							break;

						case 'search_input':

									$data = $pencatatan->searchPencatatan($_POST);
									include "view/search.php";

							break;

						//ROUTE LOKASI
						case 'index_lokasi':

									$data = $lokasi->getDataLokasi();
									include "view/lokasi/index_lokasi.php";

							break;

						case 'input_lokasi':

									include "view/lokasi/input_lokasi.php";	

							break;

						case 'insert_lokasi':

									$lokasi->insertLokasi($_POST);

							break;

						case 'edit_lokasi':

									$data = $lokasi->editLokasi($_GET['id']);
									include "view/lokasi/edit_lokasi.php";

							break;

						case 'update_lokasi':

									$lokasi->updateLokasi($_POST);

							break;

						case 'delete_lokasi':

									$lokasi->deleteLokasi($_GET['id']);

							break;

						//ROUTE USER
						case 'index_user':

									$data = $user->getDataUser();
									include "view/user/index_user.php";

							break;

						case 'input_user':

									include "view/user/input_user.php";

							break;

						case 'insert_user':

									$user->insertUser($_POST);

							break;

						case 'edit_user':

									$data = $user->editUser($_GET['id']);
									include "view/user/edit_user.php";

							break;

						case 'update_user':

									$user->updateUser($_POST);

							break;

						case 'delete_user':

									$user->deleteUser($_GET['id']);

							break;

						case 'edit_data_pribadi':

									$data = $user->editUser($_SESSION['id_pengontrol']);
									include "view/user/edit_user_pengontrol.php";

							break;

						case 'update_data_pribadi':

									$user->updateDataPribadi($_POST);

							break;
						


						case 'print':

									$data = 'asd';
									header("Location:print.php?cetak=history_pencatatan");

							break;

						//LOGOUT
						case 'logout':

								$user->logout();

							break;

						default:

							# code...

							break;
					}

				}
			/////////////////////////////////////
			}
		}


	}

?>