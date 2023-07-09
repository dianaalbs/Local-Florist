<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<title>Tambah Data Bunga</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icon-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
		<style>
			* {
				text-decoration: none;
				margin: 0px;
				padding: 0px;
				}


				html, body {
				max-width: 100%;
				overflow-x: hidden;
				}

				nav {
				background: #1f1f1f;
				height: 50px;
				}

				#logo {
				font-size: 25px;
				color: #fff;
				font-weight: bold;
				font-family: 'Dancing Script';
				font-size: 25px;
				}

				span {
				color: #fff;
				}

				.navbar-nav .nav-item .nav-link {
				color: #fff;
				}

				.navbar-nav .nav-link:hover {
				background: #fff;
				color: #000;    
				}
		</style>

</head>
<body>	

    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container-fluid ">
        <a class="navbar-brand" id="logo" href="">Local Florist</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi bi-list"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
				<li class="nav-item"><a class="nav-link py-1 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
				<li class="nav-item"><a class="nav-link py-1 px-0 px-lg-3 rounded" href="logout.php">Logout</a></li>
			</ul>		  
        </div>
        </div>
    </nav>	
	

	<div class="container pt-5 mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h2 class="text-center mb-3">Tambah Data Bunga</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group row mb-3">
					<label for="kode_bunga" class="col-sm-2 col-form-label">Kode Bunga</label>
					<div class="col-sm-10">
					<input type="text" name="kode_bunga" id="kode_bunga" class="form-control" required>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label for="nama_bunga" class="col-sm-2 col-form-label">Nama Bunga</label>
					<div class="col-sm-10">
					<input type="text" name="nama_bunga" id="nama_bunga" class="form-control" required>
				</div>

				<div class="form-group row mt-3 mb-3">
					<label for="jenis_bunga" class="col-sm-2 col-form-label">Jenis Bunga</label>
					<div class="col-sm-10">
					<input type="text" name="jenis_bunga" id="jenis_bunga" class="form-control" required>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label for="stok" class="col-sm-2 col-form-label">Stok</label>
					<div class="col-sm-10">
					<input type="text" name="stok" id="stok" class="form-control" required>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label for="harga" class="col-sm-2 col-form-label">Harga</label>
					<div class="col-sm-10">
					<input type="text" name="harga" id="harga" class="form-control" required>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
					<div class="col-sm-10">
					<input type="file" name="gambar" id="gambar" class="form-control-file" required>
					</div>
				</div>
				<div class="form-group row mb-3 row mb-3">
					<div class="col-sm-10 offset-sm-2">
					<button type="submit" name="submit" class="btn btn-dark">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

</body>
</html>