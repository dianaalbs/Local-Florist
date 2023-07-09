<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "florist");

	
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$kode_bunga = htmlspecialchars($data["kode_bunga"]);
	$nama_bunga = htmlspecialchars($data["nama_bunga"]);
	$jenis_bunga = htmlspecialchars($data["jenis_bunga"]);
	$stok = htmlspecialchars($data["stok"]);
	$harga = htmlspecialchars($data["harga"]);

	//$gambar = htmlspecialchars($data["gambar"]);


	//upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO bunga
	VALUES ('', '$kode_bunga', '$nama_bunga', '$jenis_bunga', '$stok', '$harga', '$gambar')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){
	$namaBungaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//gambar di upload atau tidak
	if($error === 4){
		echo "<(script>
			alert('silahkan pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	//gamabr yang diupload valid atau tidak
	$tipeGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaBungaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	
	//gambar siap upload
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar; 
	move_uploaded_file($tmp_name, 'img/' . $namaFileBaru);

	return $namaFileBaru;

}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$kode_bunga = htmlspecialchars($data["kode_bunga"]);
	$nama_bunga = htmlspecialchars($data["nama_bunga"]);
	$jenis_bunga = htmlspecialchars($data["jenis_bunga"]);
	$stok = htmlspecialchars($data["stok"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE bunga SET
				kode_bunga = '$kode_bunga',
				nama_bunga = '$nama_bunga',
				jenis_bunga = '$jenis_bunga',
				stok = '$stok',
				harga = '$harga',
				gambar = '$gambar'
			WHERE
				id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "delete from bunga where id = $id");

	return mysqli_affected_rows($conn);
}

function search($keyword){
	$query = "SELECT * FROM bunga WHERE
		 kode_bunga LIKE '%$keyword%' OR
		 nama_bunga LIKE '%$keyword%' OR
		 jenis_bunga LIKE '%$keyword%' OR
		 stok LIKE '%$keyword%'OR
		 harga LIKE '%$keyword%'
		";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar')
		      </script>";
		return false;
	}

	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}