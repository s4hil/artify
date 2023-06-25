<?php 
  include './components/header.php'; 
  include '../admin/php/utils.php';
?>

<?php
  if (isset($_GET['addToCart'])) {
    if (!isset($_SESSION['customerLoginStatus'])) {
      alertRedirect("login.php", "Please login first!");
    }

    $user_id = $_SESSION['userID'];
    $id = $_GET['productID'];

    $sql = "INSERT INTO `_cart` (`product_id`, `user_id`) VALUES(
            $id,
            '$user_id'
          )";

    $res = mysqli_query($conn, $sql);
    if ($res) {
      alertRedirect("cart.php", "Item Added!");
    }
  }
?>
<style>
  .box a:link, .box a:visited {
    color: #fff;
  }
  .col {

  }
</style>
  <section class="art_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Art
        </h2>
      </div>

      <ul class="filters_menu" id="nav">
        <a href="?catagory=All"><li class="active">All</li></a>
        <a href="?catagory=Oil"><li >Oil</li></a>
        <a href="?catagory=Water"><li >Water</li></a>
        <a href="?catagory=Arcylic"><li >Arcylic</li></a>
        <a href="?catagory=Abstract"><li >Abstract</li></a>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <?php
          if (isset($_GET['catagory'])) {
            $cat = $_GET['catagory'];
            $sql = "SELECT * FROM `_products` WHERE `catagory` = '$cat'";
          }
          else {
            $sql = "SELECT * FROM `_products`";

          }
            
            $res = mysqli_query($conn, $sql);
            if($res){
              while ($row = mysqli_fetch_array($res)) {
                ?>
                <a href="productDetails.php?productID=<?php echo $row['product_id'] ?>">
                  <div class="text-white col-sm-6 col-lg-4 all burger" catagory="<?php $row['img']?> ">
            <div class="box text-white">
              <div>
                <div class="img-box">
                  <img src="images/products/<?php echo $row['img']?>" alt="">
                </div>
                <div class="detail-box text-white">
                  <h5>
                    <?php echo $row['name'] ?>
                  </h5>
                  <p>
                    <?php echo substr($row['details'], 0, 125)."..." ?>
                  </p>
                  <div class="options">
                    <h6>
                      <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $row['price']?>
                    </h6>
                    <a href="?addToCart&productID=<?php echo $row['product_id']; ?> ">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
                <?php
              }
            }
          ?>
    </div>
  </section>



  <?php include './components/footer.php'; ?>



  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  </script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>

  <script>
    $("#nav").on('click', 'a', function () {
      let a = $(this).html();
    })
  </script>
</body>

</html>