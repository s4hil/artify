<?php
session_start();
include './php/db.php';
include './php/utils.php';

	if (isset($_POST['login'])) {


		$un = $_POST['username'];
		$pw = $_POST['password'];

		$sql = "SELECT * FROM `_admins` WHERE `username`= '$un' AND `password` = '$pw'";
		$res = mysqli_query($conn, $sql);;


		if ($res) {
			$admin = mysqli_fetch_array($res);
			if ($admin['username'] == $un && $admin['password'] == $pw) {
				echo "logged in";
				$_SESSION['loginStatus'] = true;
				$_SESSION['username'] = $un;
				alertRedirect('dashboard.php', 'Logged in!');
			}
			else {
				echo "not logged in";
				alertRedirect('login.php', 'NOt Logged in!');
			}
		}

	}
?>
