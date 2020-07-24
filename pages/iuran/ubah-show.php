<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Mutasi</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-show.php') ?>

<form action="update.php" method="post">
<h3>Input Uang Masuk Dan Uang Keluar</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Uang Masuk</th>
    <td width="1%">:</td>
    <td><input type="number" class="form-control" name="uang_masuk" value="<?php echo $data_iuran[0]['uang_masuk'] ?>"></td>
  </tr>
  <tr>
    <th>Uang Keluar</th>
    <td>:</td>
    <td><input type="number" class="form-control" name="uang_keluar" value="<?php echo $data_iuran[0]['uang_keluar'] ?>"></td>
  </tr>
</table>

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
<input type="hidden" name="id_iuran" value="<?php echo $data_iuran[0]['id_iuran'] ?>">
</form>


<?php include('../_partials/bottom.php') ?>
