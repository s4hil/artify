<?php
	include './components/header.php';
	include '../admin/php/db.php';
	include '../admin/php/utils.php';
?>
<section class="h-100 gradient-custom">
        <div class="container py-5">
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Cart Items</h5>
                </div>
                <div class="card-body">
                 
                  <?php
                  	$user_id = $_SESSION['userID'];
                  	$sql = "SELECT * FROM `_cart` WHERE `user_id` = '$user_id'";
                  	$res = mysqli_query($conn, $sql);
                  		if ($res) {
                  			while($row = mysqli_fetch_array($res)){
                  				?>
                  					<div class="row mt-5">
					                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
					                     	
					                     <?php
					                     $itemID = $row['product_id'];

					          				$sql2 = "SELECT * FROM `_products` WHERE `product_id` = '$itemID'";
					                     	$res2 = mysqli_query($conn, $sql2);
					                     	if ($res2) {
					                     		$product = mysqli_fetch_array($res2);
					                     	}
					                     ?>
					                     <input style="visibility: hidden;" type="text" id="order-id" value="<?php echo $itemID; ?>">


					                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
					                        <img style="height: 100px ;width:auto;" src="./images/products/<?php echo $product['img'] ?>"
					                          class="w-100" alt="" />
					                        <a href="#!">
					                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
					                        </a>
					                      </div>
					                      
					                    </div>
					      
					                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
					                      <p><strong><?php echo $product['name'] ?></strong></p>
					                      
					                      <a href="?removeCartItem&cartID=<?php echo $row['item_id'] ?>">
						                      <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
						                        title="Remove item">
						                        <i class="fas fa-trash"></i>
						                      </button>
					                      </a>
					                      <?php
					                      	if (isset($_GET['removeCartItem'])) {
					                      		$id = $_GET['cartID'];
					                      		$sql = "DELETE FROM `_cart` WHERE `item_id` = '$id'";
					                      		$res = mysqli_query($conn, $sql);
					                      		if ($res) {
					                      			alertRedirect("cart.php", "Item Removed!");
					                      		}
					                      		else {
					                      			alertRedirect("cart.php", "Item Not Removed!");
					                      		}
					                      	}
					                      ?>
					                    </div>
					      
					                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					                     
					                      <p class="text-start text-md-center">
					                        <strong>&#8377 <span class="productPrices"><?php echo $product['price'] ?></span></strong>
					                      </p>
					                      
					                    </div>
					                  </div>
                  				<?php
                  			}
                  		}
                  	
                  ?>
                  <hr class="my-4" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Products
                      <span>&#8377 <div id="productsPrice">0</div></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                      Shipping
                      <span>&#8377 <div id="gst">100</div></span>
                    </li>
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total amount</strong>
                        <strong>
                          <p class="mb-0">(including Tax)</p>
                        </strong>
                      </div>
                      <span><strong>&#8377 <div id="totalAmount">0</div></strong></span>
                    </li>
                  </ul>
      				<div id="payBtn">
	                  
	                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php
	$user_id = $_SESSION['userID'];
	$sql = "SELECT * FROM `_cart` WHERE `user_id` = '$user_id'";
	$res = mysqli_query($conn, $sql);

	if ($res) {
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_array($res)) {
				
			}
		}
		else {
			?>
				<h2 class="container text-center mt-5 p-2 alert alert-info mb-5 pb-2">No Orders</h2>
			<?php
		}
	}
?>

<?php
	include './components/footer.php';
?>
<script>
	let prices = document.querySelectorAll('.productPrices');
	let total = 0;
	for(let i = 0; i < prices.length; i++){
		total += Number(prices[i].textContent);
	}
	document.getElementById("productsPrice").textContent = total;
	let order_id = document.getElementById("order-id").value;
	let amt = document.getElementById("totalAmount").textContent = total + 1;
	
let output = `
			<a href=./pay/checkout.php?amt=`+amt+`&order_id=`+order_id+`
			<button type='button' class='btn btn-warning btn-lg btn-block' style='color: white;'> Go to checkout          
	        </button></a>`;

	document.getElementById("payBtn").innerHTML = output;
</script>