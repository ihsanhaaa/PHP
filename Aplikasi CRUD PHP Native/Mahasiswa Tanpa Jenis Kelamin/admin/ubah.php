<?php 
require 'fungsi.php';

// ambil data di URL
$id = $_GET["id"];


// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
//var_dump($mhs);


// cek apakah tombol submit sudah ditekan atau belum
if (isset(($_POST["submit"]))) {

	// cek apakah data berhasil diubah
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = 'daftarmahasiswa.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah');
				document.location.href = 'daftarmahasiswa.php';
			</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

	<div class="container my-4">
		<h1>Ubah Data Mahasiswa</h1>
		<form action="" method="post" class="my-4">
			<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		  <div class="mb-3">
		    <label for="nama" class="form-label">Nama Lengkap</label>
		    <input type="text" class="form-control" name="nama" id="nama" required value="<?php echo $mhs["nama"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label for="nim" class="form-label">NIM</label>
		    <input type="text" class="form-control" name="nim" id="nim" required value="<?php echo $mhs["nim"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label for="alamat" class="form-label">Alamat</label>
		    <input type="text" class="form-control" name="alamat" id="alamat" required value="<?php echo $mhs["alamat"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label for="nohp" class="form-label">No Handphone</label>
		    <input type="text" class="form-control" name="nohp" id="nohp" required value="<?php echo $mhs["nohp"]; ?>">
		  </div>
		  <div class="my-4">
		  	<a href="daftarmahasiswa.php" class="btn btn-danger">Kembali</a>
		  	<button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
		  </div>
		</form>
	</div>



</body>
</html>