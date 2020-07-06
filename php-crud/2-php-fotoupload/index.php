<?php 
// Koneksi ke fungsi
require 'fungsi.php';

// Koneksi ke database
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");


// Tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Admin</title>
 </head>
 <body>

 	<h1>Daftar Mahasiswa</h1>
 	<!-- Tambah Data -->
 	<a href="tambah.php">Tambah Data Mahasiswa</a>
 	<br><br>

 	<!-- Tombol Pencarian -->
 	<form action="" method="post">
 		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
 		<button type="submit" name="cari">Cari</button>
 	</form>

 	<br>
 	<!-- Struktur Tabel -->
 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No.</th>
 			<th>Aksi</th>
 			<th>Gambar</th>
 			<th>Nama</th>
 			<th>Alamat</th>
 			<th>No Hp</th>
 		</tr>

 		<?php $i = 1; ?>
 		<?php foreach ($mahasiswa as $row) : ?>
 			<tr>
 				<td><?php echo $i; ?></td>
 				<td>
 					<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
 					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('Yakin');">Hapus</a>
 				</td>
 				<td><img src="img/<?php echo $row["foto"]; ?>" width="50"></td>
 				<td><?php echo $row["nama"]; ?></td>
 				<td><?php echo $row["alamat"]; ?></td>
 				<td><?php echo $row["nohp"]; ?></td>
 			</tr>
 			<?php $i++ ?>
 		<?php endforeach; ?>
 	</table>
 
 </body>
 </html>