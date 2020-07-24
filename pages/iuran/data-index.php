<?php
include('../../config/koneksi.php');

// ambil dari database
// $query = "SELECT a.nik_warga, a.nama_warga, a.alamat_warga, CASE WHEN b.uang_masuk is NULL THEN '0' ELSE b.uang_masuk END AS uang_masuk, CASE WHEN b.uang_keluar is NULL THEN '0' ELSE b.uang_keluar END AS uang_keluar, CASE WHEN b.sisa_uang is NULL THEN '0' ELSE b.sisa_uang END AS sisa_uang FROM warga AS a LEFT JOIN iuran AS b ON a.nik_warga = b.nik";
$query = "SELECT * FROM iuran";

$hasil = mysqli_query($db, $query);

$data_iuran = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_iuran[] = $row;
}
