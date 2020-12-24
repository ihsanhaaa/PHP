<?php 
require 'fungsi.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'daftarmahasiswa.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'daftarmahasiswa.php';
		</script>
	";
}

 ?>