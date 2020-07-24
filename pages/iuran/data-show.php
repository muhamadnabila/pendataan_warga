<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_iuran = $_GET['id_iuran'];

// ambil dari database
$query = "SELECT * FROM iuran WHERE id_iuran = $get_id_iuran";

$hasil = mysqli_query($db, $query);

$data_iuran = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_iuran[] = $row;
}
