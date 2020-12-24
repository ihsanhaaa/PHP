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
	$jk = $data["jeniskelamin"];
	$email = htmlspecialchars($data["email"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);

	// query insert data
	$query = "INSERT INTO admin
				VALUES
				('', '$nama', '$jk', '$email', '$username', '$password')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

 ?>