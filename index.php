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
        font-family:  rambla;
        src: url(asset/Font/Pangolin-Regular.ttf);
    }
    @font-face {
        font-family:  elmesi;
        src: url(asset/Font/ElMessiri-Regular.ttf);
    }
	  
	body{
	font-family: elmesi;
	background-image: url("asset/backlib.jpg");
	background-size:100%;
	background-position: center;
	background-repeat: repeat;
	background-attachment: fixed;
	}

	h1{
	text-align: center;
	/*ketebalan font*/
	font-weight: 300;
	}

	/* .tulisan_login{
	text-align: center;
	text-transform: uppercase;
	} */

	/* .grid{
		position: fixed;
		display: grid;
		grid-template-columns: 45% 100%;
		padding-top: 15%;
		padding-left: 25%;
		padding-bottom:15%;
			
	} */

	/* .row{
	padding-top: 10%;
	padding-left: 25%;
	position : fixed;
	width :75%;
	} */


	/* .kotak_login{
	width: 350px;
	background: white;
	padding: 30px 50px;
	} */
	
	.image{
	
	background-image: url("asset/lib.jpg");
	background-size:200%;
	background-position: center;
	background-repeat: no-repeat;
	
	}

	.bg{
		padding: 10% 10% 10% 10%; 
	}

	/* label{
	font-size: 11pt;
	} */

	/* .form_login{
	box-sizing : border-box;
	min-width: 50%;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
	} */

	/* .tombol_login{
	background: #056da8;
	color: white;
	font-size: 11pt;
	width: 100%;
	border: none;
	border-radius: 3px;
	padding: 10px 20px;
	} */

	/* .link{
	color: #232323;
	text-decoration: none;
	font-size: 10pt;
	}

	.alert{
	background: #e44e4e;
	color: white;
	padding: 10px;
	text-align: center;j
	border:1px solid #b32929;
	} */

	/* @media only screen and (min-width: 100px) {
  	
		.row{
			padding-top:20%;
			padding-left: 8%;
			width :100%;
		}
	}
	@media only screen and (min-width: 300px) {
  
	
		.row{
			padding-top:20%;
			padding-left: 10%;
			width :100%;
		}
	}
	@media only screen and (min-width: 600px) {
  	
		.row{
			padding-top:5%;
			padding-left: 25%;
			width :100%;
		}
	}
	@media only screen and (min-width: 700px) {
  
		.row{
			padding-top:2%;
			padding-left: 20%;
			width :100%;
		}
	}
	@media only screen and (min-width: 750px) {
		.row{
			padding-top:15%;
			padding-left: 2%;
			width :100%;
		}
	}
	@media only screen and (min-width: 800px) {
		.row{
			padding-top:2%;
			padding-left: 5%;
			width :100%;
		}
	}
	@media only screen and (min-width: 1000px) {
	 
	
	  .row{
		padding-top: 0%;
		padding-left: 50%;
		position : fixed;
		width :75%;
		}
	} */
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
<?php 
	$user = @$_POST['Username'];
	$pass = @$_POST['Password'];
	$login = @$_POST['LOGIN'];
?>
</body>
</html>
 
</body>
</html>