<?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost","root","","tugascrud");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
$Nim = "";
$Nama = "";
$Tanggal = "";
$Prodi = "";
$Jeniskelamin = "";
$NomorHP = "";
$sukses = "";
$error = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}

if($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from mahasiswa where id = '$id'";
    $q1  = mysqli_query($koneksi, $sql1);
    $data  = mysqli_fetch_array($q1); 
    $Nim = $data['NIM'];
    $Nama = $data['Nama_Mhs'];
    $Jeniskelamin = $data['Jenis_Kelamin'];
    $Tanggal = $data['Tanggal_Lahir'];
    $Prodi = $data['Program_Studi'];
    $NomorHP = $data['Nomor_HP'];
    
if ($Nim == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $Nim = $_POST['NIM'];
	$Nama = $_POST['Nama_Mhs'];
	$Jeniskelamin = $_POST['Jenis_Kelamin'];
    $Prodi = $_POST['Program_Studi'];
	$NomorHP = $_POST['Nomor_HP'];
    $Tanggal = $_POST['Tanggal_Lahir'];
    if ($Nim && $Nama && $Tanggal && $Prodi && $Jeniskelamin && $NomorHP) {
        if ($op == 'edit') { //untuk update
        $sql1   = "update mahasiswa set NIM = '$Nim' ,Nama_Mhs = '$Nama', Jenis_Kelamin = '$Jeniskelamin', Program_Studi = '$Prodi', Nomor_HP = '$NomorHP', Tanggal_Lahir = '$Tanggal' where id = '$id'";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        } else {
            $sql1   = "insert into mahasiswa(NIM,Nama_Mhs,Tanggal_Lahir, Jenis_Kelamin,Program_Studi,Nomor_HP) values ('$Nim','$Nama','$Tanggal','$Prodi','$NomorHP','$Jeniskelamin')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="with=device-width, initial scale=1.0">
  <title>CRUD Website</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<style>
.mx-auto { width:1100px }
.card {margin-top: 10px;}
</style>
<body>
	<div class="mx-auto">
		<div class="card">
  			<div class="card-header">
    Tambah atau Edit Data
  			</div>
  			<div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
   				<form action="" method="POST">
   					<div class="mb-3 row">
    				<label for="nim" class="col-sm-2 col-form-label">NIM</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="nim" name="NIM" value="<?php echo $Nim?>">
    					</div>
  					</div>
  					<div class="mb-3 row">
    				<label for="nama" class="col-sm-2 col-form-label">Nama</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="nama" name="Nama_Mhs" value="<?php echo $Nama?>">
    					</div>
  					</div>
                    <div class="mb-3 row">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="Jenis_Kelamin" id="jeniskelamin">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-Laki" <?php if($Jeniskelamin == "Laki-Laki") echo "Selected"?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if($Jeniskelamin == "Perempuan") echo "Selected"?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
  					<div class="mb-3 row">
  					<label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    					<div class="col-sm-10">
      					<input type="date" class="form-control" id="tanggal" name="Tanggal_Lahir" value="<?php echo $Tanggal?>">
    					</div>
  					</div>
  					<div class="mb-3 row">
    				<label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
    					<div class="col-sm-10">
    						<select class="form-control" name="Program_Studi" id="prodi">
    							<option value="">- Pilih Program Studi -</option>
    							<option value="Teknik Informatika" <?php if($Prodi == "Teknik Informatika") echo "Selected"?>>Teknik Informatika</option>
    							<option value="Teknik Komputer" <?php if($Prodi == "Teknik Komputer") echo "Selected"?>>Teknik Komputer</option>
    							<option value="Sistem Informasi" <?php if($Prodi == "Sistem Informasi") echo "Selected"?>>Sistem Informasi</option>
    							<option value="Teknologi Informasi" <?php if($Prodi == "Teknologi Informasi") echo "Selected"?>>Teknologi Informasi</option>
    							<option value="Pendidikan Teknologi Informasi" <?php if($Prodi == "Pendidikan Teknologi Informasi") echo "Selected"?>>Pendidikan Teknologi Informasi</option>
    						</select>
    					</div>
  					</div>
  					<div class="mb-3 row">
  					<label for="nomorhp" class="col-sm-2 col-form-label">Nomor HP</label>
    					<div class="col-sm-10">
      					<input type="text" class="form-control" id="nomorhp" name="Nomor_HP" value="<?php echo $NomorHP?>">
    					</div>
  					</div>
  					<div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
				</form>
  			</div>
		</div>
	<div class="card">
  	<div class="card-header">
    Data Mahasiswa
  	</div>
        <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Program Studi</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY Nim DESC") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    $date = $_POST['Tanggal_Lahir'];
                    while($data = mysqli_fetch_assoc($sql)){
                        $id       = $data['id'];
                        $Nim = $data['NIM'];
                        $Nama = $data['Nama_Mhs'];
                        $Jeniskelamin = $data['Jenis_Kelamin'];
                        $Tanggal = $data['Tanggal_Lahir'];
                        $Prodi = $data['Program_Studi'];
                        $NomorHP = $data['Nomor_HP'];
                ?>

                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td scope="row"><?php echo $Nim ?></td>
                            <td scope="row"><?php echo $Nama ?></td>
                            <td scope="row"><?php echo $Jeniskelamin ?></td>
                            <td scope="row"><?php echo $Prodi ?></td>
                            <td scope="row"><?php echo $NomorHP ?></td>
                            <td scope="row"><?php echo $Tanggal ?></td>
                            <td>
                                <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a> 
                            </td>
                        </tr>
                <?php
                }
            }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>		