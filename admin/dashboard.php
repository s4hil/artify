<?php include './php/db.php'; ?>
<?php include './php/utils.php'; ?>


<?php
session_start();
	if (!isset($_SESSION['loginStatus']) || $_SESSION['loginStatus'] != true) {
		die("Unauthorized");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - Artify</title>
	<link rel="stylesheet" href="./assets/css/bootstrap.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="./assets/css/datatables.css">
	<style>
		.box {
			display: none;
		}
		.box:nth-child(1){
			display: block;
		}

		main {
			width: 100vw;
			min-height: 100vh;
			display: flex;
		}
		.sidebar {
			width: 25%;
			min-height: 100%;
			background: #494949;
			color: #fff;
		}
		.main-content{
			background: #f1f1f1;
			width: 100%;
		}
		.nav-list {
			list-style-type: none;
		}
		.nav-list li {
			font-size: 1.3rem;
			padding: 1rem;
		}
		.nav-list li:hover {
			color: grey;
			background-color: #393939;
			cursor: pointer;
		}
		.box-container {
			padding: .5rem;
		}
		.box {
			background-color: #fff;
			padding: 1rem;
			height: 100%;
		}
		.export-list{
			display: none;
			font-size: .5rem;
		}

		.export-list > *{
			font-size: .9rem !important;
		}
	</style>
</head>
<body>
	<main>
		<aside class="sidebar">
			<img src="./assets/imgs/favicon.png" height="100">
			<ul class="nav-list mt-2">
				<li class="" destination="Dashboard">
					<i class="fas fa-newspaper"></i><span> Dashboard</span>
				</li>
				<li class="" destination="Products">
					<i class="fas fa-shopping-cart"></i><span> Products</span>
				</li>
				<li class="" destination="Customers">
					<i class="fas fa-user"></i><span> Customers</span>
				</li>
				<li class="" destination="Orders">
					<i class="fas fa-clock"></i><span> Orders</span>
				</li>
				<li class="" destination="Transactions">
					<i class="fas fa-dollar"></i><span> Transactions</span>
				</li>
				<li class="" destination="Dashboard" id="export-btn">
					<i class="fas fa-table"></i><span> Export <i class="fas fa-caret-down"></i></span>
					<ul class="export-list">
						<li>
							<a href="./pages/exportData.php?table=products">
								Products
							</a>
						</li>
						<li>
							<a href="./pages/exportData.php?table=customers">
								Customers
							</a>
						</li>
						<li>
							<a href="./pages/exportData.php?table=orders">
								Orders
							</a>
						</li>
						<li>	
							<a href="./pages/exportData.php?table=transactions">
								Transactions
							</a>
						</li>
					</ul>
				</li>
				<a href="?logout=true">
					<button class="btn btn-danger mt-2 ml-4">
						<i class="fas fa-power-off"></i> Logout
					</button>
				</a>

				<?php
					if (isset($_GET['logout']) && $_GET['logout'] == true) {
						session_destroy();
						alertRedirect('index.php', "Logged Out Successfully");
					}
				?>
			</ul>
		</aside>
		<section class="main-content p-2">
			<div class="box-container">
				<div class="box" id="Dashboard">
					<?php include './components/home.php'; ?>
				</div>
				<div class="box" id="Products">
					<?php include 'components/products.php'; ?>
				</div>
				<div class="box" id="Customers">
					<?php include 'components/customers.php'; ?>
				</div>
				<div class="box" id="Orders">
					<?php include 'components/orders.php'; ?>
				</div>
				<div class="box" id="Transactions">
					<?php include 'components/transactions.php'; ?>
				</div>
				<div class="box" id="Export">
					<?php include 'components/export.php'; ?>

				</div>
				
			</div>
		</section>
	</main>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script>
		$(".nav-list").on('click', 'li', function () {
			let dest = $(this).attr("destination");
			$(".box").hide();
			$("#"+dest).show();


		})
		$("#export-btn").click(()=>{
			$('.export-list').slideToggle();
		})
		new DataTable('#products-table');
		new DataTable('#customer-table');
		new DataTable('#customer-table');
		new DataTable('#orders-table');
	</script>
</body>
</html>