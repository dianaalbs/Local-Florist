<?php 
require 'functions.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script> alert('user baru berhasil ditambahkan'); </script>";
    } else {
        echo mysqli_error($conn);
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
                background: pink;
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
                    position: absolute;
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
            <li class="nav-item"><a class="nav-link py-1 px-0 px-lg-3 rounded" href="login.php">Login</a></li>
            </ul>		  
        </div>
        </div>
    </nav>

    <div class="brand d-flex justify-content-center mt-4 mb-2">
	<h1 class="mt-5" style="font-family: Dancing Script; font-size: 60px;" >Local Florist</h1>
    </div>



<div class="d-flex justify-content-center align-items-center">
	<div class="card w-50">
		<div class="card-body">
            <h4 class="d-flex justify-content-center mb-4">Register</h4>
			<form action="" method="post">
            <div class="form-group row mb-3">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username" id="username">
					</div>
				</div>
				<div class="form-group row mb-3">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" id="password">
					</div>
				</div>
                <div class="form-group row mb-3">
					<label for="password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password2" id="password2">
                    </div>
				</div>
                <div class="form-group row mb-3">
					<div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-dark" name="register">Register</button>
                    </div>
				</div>
			</form>
		</div>
	</div>
</div>

<footer>
    <div class="container">
        <small>Copyright &copy; 2023 by Diana Adilla Lubis</small>
    </div>
</footer>


</body>
</html>