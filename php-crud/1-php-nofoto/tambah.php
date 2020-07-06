<?php 
require 'fungsi.php';

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
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="alamat">Alamat : </label>
				<input type="text" name="alamat" id="alamat" required>
			</li>
			<li>
				<label for="nohp">No Hp : </label>
				<input type="text" name="nohp" id="nohp" required>
			</li>
			<li>
				<label for="foto">Foto : </label>
				<input type="text" name="foto" id="foto" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>