<?php 
require 'fungsiadmin.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset(($_POST["submit"]))) {

	// cek apakah data berhasil ditambahkan
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'tambahadmin.php';
			</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container my-4">
		<h1>Tambah Admin</h1>
		<form action="" method="post" class="my-4">
		  <div class="mb-3">
		    <label for="nama" class="form-label">Nama Lengkap</label>
		    <input type="text" class="form-control" name="nama" id="nama" required>
		  </div>
		  <label for="nama" class="form-label">Jenis Kelamin</label>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="jeniskelamin" id="Laki-laki" value="Laki-laki">
			  <label class="form-check-label" for="Laki-laki">
			    Laki-laki
			  </label>
			</div>
			<div class="form-check mb-3">
			  <input class="form-check-input" type="radio" name="jeniskelamin" id="Perempuan" value="Perempuan">
			  <label class="form-check-label" for="Perempuan">
			    Perempuan
			  </label>
			</div>
		  <div class="mb-3">
		    <label for="email" class="form-label">Email</label>
		    <input type="email" class="form-control" name="email" id="email" required>
		  </div>
		  <div class="mb-3">
		    <label for="username" class="form-label">Username</label>
		    <input type="text" class="form-control" name="username" id="username" required>
		  </div>
		  <div class="mb-3">
		    <label for="password" class="form-label">Password</label>
		    <input type="password" class="form-control" name="password" id="password" required>
		  </div>
		  <div class="my-4">
		  	<a href="index.php" class="btn btn-danger">Kembali</a>
		  	<button type="submit" class="btn btn-primary" name="submit">Tambah Admin</button>
		  </div>
		</form>
	</div>

</body>
</html>