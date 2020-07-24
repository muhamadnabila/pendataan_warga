<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$uang_masuk = htmlspecialchars($_POST['uang_masuk']);
$uang_keluar = htmlspecialchars($_POST['uang_keluar']);


$id_iuran = htmlspecialchars($_POST['id_iuran']);

$id_user = $_SESSION['user']['id_user'];

// update database

$query = "UPDATE iuran SET uang_masuk = $uang_masuk, uang_keluar = $uang_keluar, sisa_uang = $uang_masuk-$uang_keluar WHERE id_iuran = $id_iuran";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah data warga berhasil'); window.location.href='../iuran'</script>";
} else {
  echo "<script>window.alert('Ubah data warga gagal!'); window.location.href='../iuran'</script>";
}
