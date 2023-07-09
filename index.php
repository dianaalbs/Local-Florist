<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$bunga = query("SELECT * FROM bunga");

//jika tombol cari di klik
if(isset($_POST["search"])){
	$bunga = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Administrator</title>
	<link rel="stylesheet" href="style.css">
        <!-- Bootstrap-->
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

				footer {
                    bottom: 0;
                    width: 100%;
                    height: 40px;
                    background-color: #1f1f1f;
                    color: #fff;
                }
                .container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100%;
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
				<li class="nav-item"><a class="nav-link py-1 px-0 px-lg-3 rounded" href="">Home</a></li>
				<li class="nav-item"><a class="nav-link py-1 px-0 px-lg-3 rounded" href="logout.php">Logout</a></li>
            </ul>		  
        </div>
        </div>
    </nav>
    

	<div class="brand d-flex justify-content-center mt-5 mb-3">
		<h1 class="mt-5" style="font-family: Dancing Script; font-size: 60px;" >Local Florist</h1>
	</div>

	<div class=" mx-auto w-75 d-flex justify-content-center mb-5">
		<form action="" method="post">
			<input class=" w-40 rounded" type="text" name="keyword" placeholder="masukkan keyword" size="40" style="height: 37px;" autocomplete="off">
			<button class="btn btn-dark w-40 mb-2" type="submit" name="search">Search</button>
		</form>
	</div>
	
	<div class="row mx-auto w-75 mb-3">
		<h4 class="col-6 d-flex justify-content-start">Daftar Bunga</h4>
		<div class="col-6 d-flex justify-content-end">
		<a href="tambah.php" class="btn btn-default btn-dark">Tambah Data</a>
		</div>
	</div>
	
<div class="table table-responsive mx-auto w-75">
<table class="table table-bordered text-center align-baseline" cellspacing="0" cellpadding="20">
	<thead class="table-danger">
	<tr>
		<th>No.</th>
		<th>Kode Bunga</th>
		<th>Nama Bunga</th>
		<th>Jenis Bunga</th>
		<th>Stok</th>
		<th>Harga</th>
		<th>Gambar</th>
		<th>Aksi</th>
	</tr>
	</thead>
	
	<?php $i = 1; ?>
	<?php foreach( $bunga as $row ) : ?>
	<tbody class="bg-white">
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["kode_bunga"]; ?></td>
		<td><?= $row["nama_bunga"]; ?></td>
		<td><?= $row["jenis_bunga"]; ?></td>
		<td><?= $row["stok"]; ?></td>
		<td><?= $row["harga"]; ?></td>
		<td> <img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a>
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">hapus</a></td>
		</td>       
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<footer>
    <div class="container">
        <small>Copyright &copy; 2023 by Diana Adilla Lubis</small>
    </div>
</footer>

</body>
</html>