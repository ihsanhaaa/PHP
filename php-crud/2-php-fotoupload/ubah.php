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
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $mhs["foto"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?php echo $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat : </label>
				<input type="text" name="alamat" id="alamat" required value="<?php echo $mhs["alamat"]; ?>">
			</li>
			<li>
				<label for="nohp">No Hp : </label>
				<input type="text" name="nohp" id="nohp" required value="<?php echo $mhs["nohp"]; ?>">
			</li>
			<li>
				<label for="foto">Foto : </label> <br>
				<img src="img/<?php echo $mhs['foto']; ?>" width="80"> <br>
				<input type="file" name="foto" id="foto">
			</li>
			<br>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>