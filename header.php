<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Divakar</title>
    <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<style>
		.w-100{
			height: 394px;
		}
		.icon-blue{
			color: blue;
			font-size:140%;
			}
		.icon-red{
			font-size: 170%;
			color:red;
			}
		</style>  

</head>
  <body>
	<div class="container-sm">
    <nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
		  <a class="navbar-brand" href="index.php"><?= (isset($_SESSION) && $_SESSION['name'] !="" ? $_SESSION['name']:'')?></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">SALE</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="add.php">ADD</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="list.php">LIST</a>
			  </li>
			  <?php if(isset($_SESSION) && $_SESSION['name']!="" ){?>
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="logout.php">LOGOUT</a>
			  </li>
			  <?php } else{?> 
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="login.php">LOGIN</a>
			  </li> <?php } ?> 
			</ul>
			<!-- <form class="d-flex" role="search">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-primary" type="submit">Search</button>
			</form> -->
		  </div>
		</div>
	  </nav>





