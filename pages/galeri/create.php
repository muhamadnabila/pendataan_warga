<?php include('../_partials/top.php') ?>

<h1 class="page-header">Galeri</h1>
<?php include('_partials/menu.php') ?>

<form action="" method="post">
<h3>A. Data Pribadi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Path</th>
    <td width="1%">:</td>
    <td><input type="file" class="form-control" name="_galeri"></td>
  </tr>
  <tr>
    <th>Caption</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="_galeri"></td>
  </tr>
  <tr>
    <th>Tautan</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="_galeri"></td>
  </tr>
</table>

<h3>B. Data Aplikasi</h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">Diinput oleh</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="_galeri"></td>
  </tr>
  <tr>
    <th>Diinput</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="_galeri"></td>
  </tr>
  <tr>
    <th>Diperbaharui</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="_galeri"></td>
  </tr>
</table>

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>

<?php include('../_partials/bottom.php') ?>