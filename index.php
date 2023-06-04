<!DOCTYPE html>
<html>

<head>
	<title>Perpustakaan Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Icon -->
	<link rel="icon" type="image/png" href="asset/card-2.jpg">

	<!-- Custom Icon -->
	<link rel="stylesheet" href="asset/icon/css/all.min.css">

	<!-- Custom styles for this template -->
	<link href="asset/project.css" rel="stylesheet">

	<!-- Bootstrap core JavaScript -->
	<script src="asset/jquery/jquery.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="asset/jquery/popper.min.js"></script>
	<script src="asset/jquery/alert.js"></script>
	<script src="asset/password.js"></script>


</head>

<body>
	<style>
		@font-face {
			font-family: rambla;
			src: url(asset/Font/Pangolin-Regular.ttf);
		}

		@font-face {
			font-family: elmesi;
			src: url(asset/Font/ElMessiri-Regular.ttf);
		}

		body {
			font-family: elmesi;
			background-image: url("asset/backlib.jpg");
			background-size: 100%;
			background-position: center;
			background-repeat: repeat;
			background-attachment: fixed;
		}

		h1 {
			text-align: center;
			/*ketebalan font*/
			font-weight: 300;
		}

		.image {

			background-image: url("asset/lib.jpg");
			background-size: 200%;
			background-position: center;
			background-repeat: no-repeat;

		}

		.bg {
			padding: 10% 10% 10% 10%;
		}
	</style>

	<body>
		<div class="container bg">

			<div class="row shadow-lg">

				<div class="card col-md-6 image">

				</div>
				<div class="col-md-6 card kotak_login p-5">

					<h3 class="text-center tulisan_login mb-5 text-primary">Silahkan login</h3>

					<form action="session/cek_login.php" method="post">
						<label class="h6 text-primary">Username</label>
						<div class="form-group row">
							<div class="input-group col-md-12">
								<input type="text" name="Username" class="form-control form_login" placeholder="Masukan Username" required="required">
								<span class="input-group-text bg-light"><i class="fab fa-google"></i></span>
							</div>
						</div>
						<label class="h6 text-primary">Password</label>
						<div class="form-group row">
							<div class="input-group col-md-12">
								<input id="login" type="password" name="Password" class="form-control form_login" placeholder="Masukan Password" required="required">
								<span class="input-group-text bg-white" id="button-login" onclick="login_password()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
							</div>
						</div>

						<?php include "asset/pesan.php"; ?>
						<input type="submit" class="btn btn-primary btn-block rounded-pill tombol_login mb-2" value="LOGIN">

					</form>

				</div>
			</div>

		</div>
	</body>

</html>

</body>

</html>