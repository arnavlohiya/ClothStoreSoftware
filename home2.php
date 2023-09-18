<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<style>
		.w-100{
			height: 394px;
		}
		
		</style>  

</head>
  <body>
	<div class="container-sm">
    <nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Dropdown
				</a>
				<ul class="dropdown-menu">
				  <li><a class="dropdown-item" href="#">Action</a></li>
				  <li><a class="dropdown-item" href="#">Another action</a></li>
				  <li><hr class="dropdown-divider"></li>
				  <li><a class="dropdown-item" href="#">Something else here</a></li>
				</ul>
			  </li>
			  <li class="nav-item">
				<a class="nav-link disabled">Disabled</a>
			  </li>
			</ul>
			<form class="d-flex" role="search">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		  </div>
		</div>
	  </nav>

		<!-- <div class="row">
		  <div class="col">
			1 of 2
		  </div>
		  <div class="col">
			2 of 2
		  </div>
		  <div class="col">
			2 of 2
		  </div>
		</div> -->
		
		<div class="row">
			<div class="col-lg-8">
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
					<div class="carousel-indicators">
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<img src="https://cdn.hasselblad.com/hasselblad-com/6cb604081ef3086569319ddb5adcae66298a28c5_x1d-ii-sample-01-web.jpg?auto=format&q=97" class="d-block w-100" alt="Banner1">
						<div class="carousel-caption d-none d-md-block">
						  <h5>First slide label</h5>
						  <p>Some representative placeholder content for the first slide.</p>
						</div>
					  </div>
					  <div class="carousel-item">
						<img src="https://cdn.hasselblad.com/afc871b06c3cc43cdd875f0a40a90c76875862c3_tinypng_tom_oldham_hasselblad_h6d-50c__x2650.jpg" class="d-block w-100" alt="Banner2">
						<div class="carousel-caption d-none d-md-block">
						  <h5>Second slide label</h5>
						  <p>Some representative placeholder content for the second slide.</p>
						</div>
					  </div>
					  <div class="carousel-item">
						<img src="https://nikonrumors.com/wp-content/uploads/2014/03/Nikon-1-V3-sample-photo.jpg" class="d-block w-100" alt="Banner3">
						<div class="carousel-caption d-none d-md-block">
						  <h5>Third slide label</h5>
						  <p>Some representative placeholder content for the third slide.</p>
						</div>
					  </div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
				  </div>

			</div>
			<div class="col-lg-4">

				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Sample_abc.jpg" class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Sample_abc.jpg" class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Sample_abc.jpg" class="d-block w-100" alt="...">
					  </div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
				  </div>

			</div>
		  </div>
		 
		  <div class="row mt-4">

			<div class="col-lg-3">
				<div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXzHIRDDTuW-VWmIyEomRi66B3mxhh5rYB1g&usqp=CAU" class="card-img-top" alt="...">
					<div class="card-body">
					  <h5 class="card-title">Card title</h5>
					  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  <a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				  </div>
			</div>

			<div class="col-lg-3">
				<div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXzHIRDDTuW-VWmIyEomRi66B3mxhh5rYB1g&usqp=CAU" class="card-img-top" alt="...">
					<div class="card-body">
					  <h5 class="card-title">Card title</h5>
					  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  <a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				  </div>
			</div>
			<div class="col-lg-3">
				<div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXzHIRDDTuW-VWmIyEomRi66B3mxhh5rYB1g&usqp=CAU" class="card-img-top" alt="...">
					<div class="card-body">
					  <h5 class="card-title">Card title</h5>
					  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  <a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				  </div>
			</div>
			
			<div class="col-lg-3">
				<div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXzHIRDDTuW-VWmIyEomRi66B3mxhh5rYB1g&usqp=CAU" class="card-img-top" alt="...">
					<div class="card-body">
					  <h5 class="card-title">Card title</h5>
					  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  <a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				  </div>
			</div>
			</div>


			<div class="row mt-4">
				<div class="col-lg-6">

					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
						  <h2 class="accordion-header" id="headingOne">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Accordion Item #1
							</button>
						  </h2>
						  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
							  <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
							</div>
						  </div>
						</div>
						<div class="accordion-item">
						  <h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  Accordion Item #2
							</button>
						  </h2>
						  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body">
							  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
							</div>
						  </div>
						</div>
						<div class="accordion-item">
						  <h2 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Accordion Item #3
							</button>
						  </h2>
						  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body">
							  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
							</div>
						  </div>
						</div>
					  </div>


				</div>
				<div class="col-lg-6">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Name</label>
					<input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
				  </div>
				  <div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Email address</label>
					<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				  </div>
				  <div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				  </div>

				  <div class="mb-3">
					<button type="button" class="btn btn-primary btn-sm">Submit</button>
				  </div>

			</div>
		</div>


		<div class="row mt-4">

			<div class="alert alert-primary" role="alert">
				A simple primary alert—check it out!
			  </div>
			  <div class="alert alert-secondary" role="alert">
				A simple secondary alert—check it out!
			  </div>
			  <div class="alert alert-success" role="alert">
				A simple success alert—check it out!
			  </div>
			  <div class="alert alert-danger" role="alert">
				A simple danger alert—check it out!
			  </div>
			  <div class="alert alert-warning" role="alert">
				A simple warning alert—check it out!
			  </div>
			  <div class="alert alert-info" role="alert">
				A simple info alert—check it out!
			  </div>
			  <div class="alert alert-light" role="alert">
				A simple light alert—check it out!
			  </div>
			  <div class="alert alert-dark" role="alert">
				A simple dark alert—check it out!
			  </div>
		</div>
			
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>