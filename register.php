<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row justify-content-center align-items-center h-100">
				<div class="col-12 col-lg-9 col-xl-7">
					<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
						<div class="card-body p-4 p-md-5">
							<h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
							<form action="api/register.php" method="post" autocomplete="off">

								<div class="row">
									<div class="col-md-6 mb-6">
										<div data-mdb-input-init class="form-outline mb-8">
											<input type="text" name="username" id="username" class="form-control" required />
											<label class="form-label" for="registerUsername">Username</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 mb-6">
										<div data-mdb-input-init class="form-outline mb-8">
											<input type="password" name="password" id="password" class="form-control" required />
											<label class="form-label" for="registerPassword">Password</label>
										</div>
									</div>
								</div>

								<div class="mt-4 pt-2">
									<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-3">Register</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>