<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_iuran = htmlspecialchars($_GET['id_iuran']);

// delete database
$query = "DELETE FROM iuran WHERE id_iuran = $id_iuran";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../iuran'</script>";
} else {
  echo "<script>window.alert('Data iuran gagal dihapus!'); window.location.href='../iuran'</script>";
}
