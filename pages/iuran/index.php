<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Iuran</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>
<?php include('../dasbor/data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>NIK</th>
      <th>Nama Warga</th>
      <!-- <th>Lahir</th> -->
      <th>Alamat Lengkap</th>
      <th>Uang Masuk</th>
      <th>Uang Keluar</th>
      <th>Sisa Uang</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($data_iuran as $iuran) : ?>
    <tr>
      <td><?php echo $nomor++ ?>.</td>
      <td><?php echo $iuran['nik_warga'] ?></td>
      <td><?php echo $iuran['nama_warga'] ?></td>
      <td><?php echo $iuran['alamat_warga'] ?></td>
      <td><?php echo rupiah($iuran['uang_masuk']) ?></td>
      <td><?php echo rupiah($iuran['uang_keluar']) ?></td>
      <td><?php echo rupiah($iuran['sisa_uang']) ?></td>
      <td>
        <!-- Single button for aksi -->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <li>
              <a href="show.php?id_iuran=<?php echo $iuran['id_iuran'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
            </li>
            <li>
              <a href="ubah-show.php?id_iuran=<?php echo $iuran['id_iuran'] ?>" target="_blank"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
            </li>
            <li>
              <a href="cetak-show.php?id_iuran=<?php echo $iuran['id_iuran'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
            </li>
            <?php if ($_SESSION['user']['status_user'] != 'RW'): ?>
            <li class="divider"></li>
            <li>
              <a href="delete.php?id_iuran=<?php echo $iuran['id_iuran'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                <i class="glyphicon glyphicon-trash"></i> Hapus
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<br><br>

<div class="well">
  <dl class="dl-horizontal">
    <dt>Total Iuran Masuk</dt>
    <dd><?php echo $jumlah_total_iuran['total'] ?> orang</dd>

    <dt>Total Data Iuran</dt>
    <dd><?php echo $jumlah_data_iuran['total'] ?> orang</dd>

    <dt>Total Sisa Uang</dt>
    <dd><?php echo rupiah($jumlah_iuran_sisa_uang['total']) ?></dd>

  </dl>
</div>

<?php 
  function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
  }
?>
<?php include('../_partials/bottom.php') ?>
