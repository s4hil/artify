<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="icon" href="./favicon.png">
	<style type="text/css">
		* {
			/*border: 1px solid black;*/
		}
	</style>
	<style>
		label {
			color: #fff;
		}
		.col {
			display: flex;
			justify-content: center;
			flex-direction: column;
		}
	</style>
</head>

<body style="background-color: #222831">
	<main class="mt-5 d-flex justify-content-center">
		<div class="row container d-flex justify-content-center">
			<div class="col col-lg-4">
				<img src="./assets/imgs/favicon.png" height="100" style="object-fit: fill;">
				<form class="form mt-5" action="loginCheck.php" method="POST">
					<fieldset class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" required >
					</fieldset>
					<fieldset class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</fieldset>
					<fieldset class="form-group">
						<button class="btn btn-success form-control" type="submit" name="login">Login</button>
					</fieldset>
				</form>
			</div>
		</div>

	</main>
</body>
</html>