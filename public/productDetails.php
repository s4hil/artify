<?php 
  include './components/header.php'; 
?>

<?php
    if (isset($_GET['productID'])) {
        $id = $_GET['productID'];
    }
    $sql = "SELECT * FROM `_products` WHERE `product_id` = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $prod = mysqli_fetch_array($res);
    }
?>
  </div>
  <div class="s my-5 p-5"><div class="d-flex flex-row mb-3 m-4" style="gap: 10%;">
    <div class="p-2 justify-content-start" style="margin-left: 10%;"><div class="card" style="width: 18rem;">
        <img src="./images/products/<?php echo $prod['img']; ?>" class="card-img-top" alt="...">
      </div>
    </div>

    <div class="p-2;">
        <h4><strong>Product Name</strong></h4>
        <p style="font-size: small;"><?php echo $prod['name']; ?></p>
        
        <h4><strong>Product Description</strong></h4>
        <p style="font-size: small;"><?php echo $prod['details']; ?></p>

        <h4><strong>Type of Art</strong></h4>
        <p style="font-size: small;"><?php echo $prod['catagory']; ?></p>
        <h4><strong>Price</strong></h4>
        <p style="font-size: small;"><?php echo $prod['price']; ?>/-</p>
        <a href="?addToCart&productID=<?php echo $prod['product_id']; ?>" class="btn btn-warning" style="color: white;"> <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Add to Cart</a>
        <?php
            if (isset($_GET['addToCart'])) {
                if (!isset($_SESSION['customerLoginStatus'])) {
                  alert("login.php", "Please login first!");
                }
                $user_id = $_SESSION['userID'];
                $sql = "INSERT INTO `_cart` (`product_id`, `user_id`) VALUES(
                        $id,
                        '$user_id'
                      )";

                $res = mysqli_query($conn, $sql);
                if ($res) {
                  alert("cart.php", "Item Added!");
                }
              }
        ?>
    </div></div>
  
        
      </div></div>
    
  </div>

  <?php
    include './components/footer.php';
  ?>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>

</body>

</html>