<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
      // Logo
      $this->Image('../../assets/img/logo-jakbar.jpg',20,10);

    	// Arial bold 15
    	$this->SetFont('Times','B',15);
    	// Move to the right
    	// $this->Cell(60);
    	// Title
        $this->Cell(308,8,'PENGURUS RT. 003 RW 016',0,1,'C');
        $this->Cell(308,8,'KEL. TOMANG, KEC. GROGOL PETAMBURAN',0,1,'C');
    	$this->Cell(308,8,'JAKARTA BARAT',0,1,'C');
    	// Line break
    	$this->Ln(5);

        $this->SetFont('Times','BU',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(308,0,'',1,1,'C');
        }

        $this->Ln(1);

        $this->Cell(308,8,'LAPORAN DATA WARGA',0,1,'C');
        $this->Ln(2);

        $this->SetFont('Times','B',9.5);

        // header tabel
        $this->cell(8,7,'NO.',1,0,'C');
        $this->cell(23,7,'NIK',1,0,'C');
        $this->cell(40,7,'NAMA',1,0,'C');
        $this->cell(35,7,'TEMPAT LHR',1,0,'C');
        $this->cell(20,7,'TGL. LHR',1,0,'C');
        $this->cell(8,7,'JK',1,0,'C');
        $this->cell(8,7,'U',1,0,'C');
        $this->cell(51,7,'ALAMAT',1,0,'C');
        $this->cell(7,7,'RT',1,0,'C');
        $this->cell(7,7,'RW',1,0,'C');
        $this->cell(37,7,'UANG MASUK',1,0,'C');
        $this->cell(37,7,'UANG KELUAR',1,0,'C');
        $this->cell(37,7,'SISA UANG',1,1,'C');

    }

    // Page footer
    function Footer()
    {
    	// Position at 1.5 cm from bottom
    	$this->SetY(-15);
    	// Arial italic 8
    	$this->SetFont('Arial','I',8);
    	// Page number
    	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

//convert rupiah
function rupiah($angka){
    $hasil_rupiah = "Rp " .number_format($angka,2,',','.');
    return $hasil_rupiah;
}

// ambil dari database
$query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM iuran";
$hasil = mysqli_query($db, $query);
$data_iuran = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_iuran[] = $row;
}


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data_iuran as $iuran) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(23, 7, strtoupper($iuran['nik_warga']), 1, 0, 'C');
    $pdf->cell(40, 7, substr(strtoupper($iuran['nama_warga']),0 , 17), 1, 0, 'L');
    $pdf->cell(35, 7, strtoupper($iuran['tempat_lahir_warga']), 1, 0, 'L');
    $pdf->cell(20, 7, ($iuran['tanggal_lahir_warga'] != '0000-00-00') ? date('d-m-Y', strtotime($iuran['tanggal_lahir_warga'])) : '', 1, 0, 'C');
    $pdf->cell(8, 7, substr(strtoupper($iuran['jenis_kelamin_warga']), 0, 1), 1, 0, 'C');
    $pdf->cell(8, 7, strtoupper($iuran['usia_warga']), 1, 0, 'C');
    $pdf->cell(51, 7, substr(strtoupper($iuran['alamat_warga']), 0, 20), 1, 0, 'L');
    $pdf->cell(7, 7, strtoupper($iuran['rt_warga']), 1, 0, 'C');
    $pdf->cell(7, 7, strtoupper($iuran['rw_warga']), 1, 0, 'C');
    $pdf->cell(37, 7, strtoupper(rupiah($iuran['uang_masuk'])), 1, 0, 'C');
    $pdf->cell(37, 7, strtoupper(rupiah($iuran['uang_keluar'])), 1, 0, 'C');
    $pdf->cell(37, 7, strtoupper(rupiah($iuran['sisa_uang'])), 1, 1, 'C');
}

	$pdf->Ln(10);

$pdf->Output();
?>
