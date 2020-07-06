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
	$foto = htmlspecialchars($data["foto"]);

	// query insert data
	$query = "INSERT INTO mahasiswa 
				VALUES
				('', '$nama', '$alamat', '$nohp', '$foto')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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
	$foto = htmlspecialchars($data["foto"]);

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