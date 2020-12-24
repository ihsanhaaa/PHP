<!-- cek apakah sudah login -->
<?php 

session_start();
if($_SESSION['status']!="login"){
	header("location:../index.php?pesan=belum_login");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="beranda.php">UAS PEMWEB</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="daftarmahasiswa.php">Mahasiswa</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="tentang.php">Tentang</a>
	        </li>
	      </ul>
	    </div>
	    <a href="logut.php" class="btn btn-danger">LOGOUT</a>
	  </div>
	</nav>

	<div class="container my-4">
		<h2>Selamat Datang <?php echo $_SESSION['username']; ?></h2>
	</div>

</body>
</html>