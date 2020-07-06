<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;
	// ambil data dari tiap elemen
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nohp = htmlspecialchars($data["nohp"]);

	// Upload gambar
	$foto = upload();
	if (!$foto) {
		return false;
	}
	// $foto = htmlspecialchars($data["foto"]);

	// query insert data
	$query = "INSERT INTO mahasiswa 
				VALUES
				('', '$nama', '$alamat', '$nohp', '$foto')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function upload() {
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// Cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
			return false;
	}

	// Cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang anda upload bukan gambar');
			</script>";
			return false;
	}

	// Cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar');
			</script>";
			return false;
	}

	// Lolos pengecekkan, gambar siap diupload
	// Generate nama gambar atau foto
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;

}





function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	// ambil data dari tiap elemen
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nohp = htmlspecialchars($data["nohp"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// Cek apakah user pilih gambar baru atau tidak
	if ($_FILES['foto']['error'] === 4) {
		$foto = $gambarLama;
	} else {
		$foto = upload();
	}


	// query insert data
	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				alamat = '$alamat',
				nohp = '$nohp',
				foto = '$foto'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
	$query = "SELECT * FROM mahasiswa WHERE
				nama LIKE '%$keyword%' OR 
				alamat LIKE '%$keyword%'
			";
			return query($query);
}


 ?>