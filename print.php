<?php
	require('function/class/plugin/fpdf.php');
	require_once 'function/bootstrap.php';
	User::logCheck();
	$lokasi = new Lokasi();
	$pencatatan = new Pencatatan();
	$data = $lokasi->getDataLokasi();
 	
 	// PEMANGGILAN CLASS UNTUK PRINT KE DALAM PDF
	$pdf = new FPDF();
	$pdf->AddPage('P');
	$pdf->SetFont('Arial','B',16);
	#setting judul laporan dan header tabel
	$judul = "HISTORY PENCATATAN PENUMPANG BUS";
	#tampilkan judul laporan
	$pdf->SetFont('Arial','B','16');
	$pdf->Cell(0,20, $judul, '0', 1, 'C');

	$header = array(
		array("label"=>"TANGGAL", "length"=>24, "align"=>"L"),
		array("label"=>"JAM", "length"=>15, "align"=>"L"),
		array("label"=>"NO POLISI", "length"=>30, "align"=>"L"),
		array("label"=>"NAMA KRU", "length"=>35, "align"=>"L"),
		array("label"=>"JUMLAH PENUMPANG", "length"=>42, "align"=>"L"),
		array("label"=>"PENGONTROL", "length"=>45, "align"=>"L"),
	);
	#buat header tabel
	$pdf->SetFont('Arial','B','10');
	$pdf->SetFillColor(196,196,196);
	$pdf->SetTextColor(0);
	$pdf->SetDrawColor(158,158,158);
	foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', 'C', true);
	}
	$pdf->Ln();
	#tampilkan data tabelnya
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');
	$fill=false;
	if($data == null){

		$pdf->Cell('191', 5, '-- Data tidak ditemukan. --', 1, '0', 'C', $fill);
		$pdf->Ln();

	}else{

		foreach ($data as $baris) {
			$i = 0;
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell('191', 7, 'Lokasi : '.$baris['nama_lokasi'], 1, '0', $kolom['align'], $fill);
			$pdf->SetFont('');
			
			$pdf->Ln();

			$data2 = $pencatatan->getPrint($baris['id_lokasi']);
			if($data2 != null){
				foreach ($data2 as $cell) {
					$pdf->Cell('24', 5, $pencatatan->parseDate($cell['tanggal']), 1, '0', $kolom['align'], $fill);
					$pdf->Cell('15', 5, $pencatatan->cutTime($cell['jam']), 1, '0', $kolom['align'], $fill);
					$pdf->Cell('30', 5, $cell['no_polisi'], 1, '0', $kolom['align'], $fill);
					$pdf->Cell('35', 5, $cell['nama_kru'], 1, '0', $kolom['align'], $fill);
					$pdf->Cell('42', 5, $cell['jumlah_penumpang'], 1, '0', 'R', $fill);
					$pdf->Cell('45', 5, $cell['nama_pengontrol'], 1, '0', $kolom['align'], $fill);
					$pdf->Ln();
				}
				$fill = !$fill;
				
			}else{
				$pdf->SetFont('Arial','',8);
				$pdf->Cell('191', 5, '-- Data '.$baris['nama_lokasi'].' tidak ditemukan. --', 1, '0', 'C', $fill);
				$pdf->SetFont('');
				$pdf->Ln();

			}
			
		}

	}


	$pdf->Ln();
	$pdf->Output();

?>