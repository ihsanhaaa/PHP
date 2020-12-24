<?php 
// Koneksi ke fungsi
require 'fungsi.php';

// Koneksi ke database
$mahasiswa = query("SELECT * FROM tb_mahasiswa ORDER BY nama ASC");


// Tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 </head>
 <body>

 	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="beranda.php">UAS PEMWEB</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="beranda.php">Beranda</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="daftarmahasiswa.php">Mahasiswa</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="tentang.php">Tentang</a>
	        </li>
	      </ul>
	      <!-- Tombol Pencarian -->
	      <form class="d-flex" action="" method="post">
	        <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Pencarian.." autocomplete="off">
	        <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
	      </form>
	    </div>
	  </div>
	</nav>


	<div class="container my-4">
 	<h1>Daftar Mahasiswa</h1>
 	<!-- Tambah Data -->
 	<a href="tambah.php" class="btn btn-success my-4">Tambah Data Mahasiswa</a>

 	<!-- Struktur Tabel -->
 	<table class="table table-striped">
 		<tr>
 			<th>No.</th>
 			<th>Nama</th>
 			<th>NIM</th>
 			<th>Jenis Kelamin</th>
 			<th>Alamat</th>
 			<th>No Hp</th>
 			<th>Aksi</th>
 		</tr>

 		<?php $i = 1; ?>
 		<?php foreach ($mahasiswa as $row) : ?>
 			<tr>
 				<td><?php echo $i; ?></td>
 				<td><?php echo $row["nama"]; ?></td>
 				<td><?php echo $row["nim"]; ?></td>
 				<td><?php echo $row["jk"]; ?></td>
 				<td><?php echo $row["alamat"]; ?></td>
 				<td><?php echo $row["nohp"]; ?></td>
 				<td>
 					<a href="ubah.php?id=<?php echo $row["id"]; ?>" class="badge bg-primary">Ubah</a>
 					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('Yakin ingin menghapus data?');" class="badge bg-danger">Hapus</a>
 				</td>
 			</tr>
 			<?php $i++ ?>
 		<?php endforeach; ?>
 	</table>
 	</div>
 
 </body>
 </html>