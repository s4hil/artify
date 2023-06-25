<?php
	include '../admin/php/db.php';
	include '../admin/php/utils.php';
	session_start();
	if ($_POST) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM `_customers` WHERE `email` = '$email' AND `password` = '$password'";
		$res = mysqli_query($conn, $sql);
		if ($res) {
			if (mysqli_num_rows($res) > 0) {
				$user = mysqli_fetch_array($res);
				$_SESSION['userID'] = $user['customer_id'];
				$_SESSION['userName'] = $user['name'];
				$_SESSION['customerLoginStatus'] = true;
				alertRedirect("index.php", "Logged In!");
			}
			else {
				alertRedirect("Login.php", "User Not Found!");
			}
		}
		else {
			alertRedirect("Login.php", "Query Failed!");
		}
	}
?>