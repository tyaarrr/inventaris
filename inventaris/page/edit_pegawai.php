<?php
$id_pegawai = $_GET['id_pegawai'];
if (empty($id_pegawai)) {
?>
<script type="text/javascript">
window.location.href="?p=pegawai";
</script>
<?php
}
$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";  
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);
if($cek > 0) {
$data =mysqli_fetch_array($query);


}else{
$data = NULL;
}
?>
<div class="row">
<div class="col-lg-4">
<div class="panel panel-primary">
<div class="panel-heading">Edit pegawai</div>
<div class="panel-body">
<form action="" method="POST">
<div class="form-group">
<label for="">Kode pegawai</label> <input type="text" class="form-control" name="kode_pegawai" value="<?= $data['kode_pegawai']?>">
</div>
<div class="form-group">

<label for="">Nama pegawai</label>
<input type="text" class="form-control" name="nama_pegawai" value="<?= $data['nama_pegawai']?>">
</div>
<div class="form-group">
<label for="">NIP</label>
<input type="number" class="form-control" value="<?= $data['nama_pegawai']?>" name="nip">
</div>
<div class="form-group">
<label for="">Alamat</label>
<textarea name="alamat" id="" rows="5" cols="30" class="form-control" value="<?= $data['alamat']?>"><?= $data['alamat']?></textarea>
</div>
<div class="form-group">
<button class="btn btn-md btn-primary">Simpan</button>
<a href="?p=pegawai" class="btn btn-md btn-default">Kembali</a>
</div>

<div class="form-group">
<button class="btn btn-md btn-primary" name="simpan" type="submit">Simpan</button>

<a href="?p=pegawai" class="btn btn-md btn-default">Kembali</a>
</div>
</form>
<?php
if(isset($_POST['simpan'])){
$id_pegawai = $_POST['id_pegawai'];
$nama = $_POST['nama_pegawai'];
$nip = $_POST['nip'];
$alamat = $_POST['alamat'];

$sql_update = "UPDATE pegawai SET
id_pegawai='$id_pegawai',
nama_pegawai='$nama',
nip='$nip',
alamat='$alamat',";


$q_update = mysqli_query($koneksi, $sql_update);

if($q_update) {
?>
<script type="text/javascript">
window.location.href="?p=pegawai"
</script>
<?php
}else{
?>
<div class="alert alert-danger">
Pegawai Gagal di Update!
</div>
<?php
}
}
?>
</div>
</div>
</div>
</div> 

