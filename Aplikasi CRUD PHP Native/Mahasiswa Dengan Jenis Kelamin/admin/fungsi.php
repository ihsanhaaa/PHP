<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "uas");

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
	$nim = htmlspecialchars($data["nim"]);
	$jk = $data["jeniskelamin"];
	$alamat = htmlspecialchars($data["alamat"]);
	$nohp = htmlspecialchars($data["nohp"]);

	// query insert data
	$query = "INSERT INTO tb_mahasiswa 
				VALUES
				('', '$nama', '$nim', '$jk', '$alamat', '$nohp')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	// ambil data dari tiap elemen
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$jk = $data["jeniskelamin"];
	$alamat = htmlspecialchars($data["alamat"]);
	$nohp = htmlspecialchars($data["nohp"]);

	// query insert data
	$query = "UPDATE tb_mahasiswa SET
				nama = '$nama',
				nim = '$nim',
				jk = '$jk',
				alamat = '$alamat',
				nohp = '$nohp'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
	$query = "SELECT * FROM tb_mahasiswa WHERE
				nama LIKE '%$keyword%' OR 
				nim LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%' OR
				jk LIKE '%$keyword%'
			";
			return query($query);
}


 ?>