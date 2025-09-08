<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
	<section class="vh-100">
		<div class="container-fluid h-custom">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-9 col-lg-6 col-xl-5">
					<img src="assets/img/agritech logo.svg"
						class="img-fluid" alt="Sample image">
				</div>
				<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
					<form action="api/authenticate.php" method="post">
						<div data-mdb-input-init class="form-outline mb-4">
							<input type="text" class="form-control form-control-lg"
								placeholder="Enter username" id="username" name="username" />
							<label class="form-label" for="form3Example3">Username</label>
						</div>

						<div data-mdb-input-init class="form-outline mb-3">
							<input type="password" id="form3Example4" class="form-control form-control-lg"
								placeholder="Enter password" id="password" name="password" />
							<label class="form-label" for="form3Example4">Password</label>
						</div>

						<div class="text-center text-lg-start mt-4 pt-2">
							<input type="submit" value="Login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
								style="padding-left: 2.5rem; padding-right: 2.5rem;">
							<p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
									class="link-danger">Register</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>

</html>