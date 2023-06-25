<?php include './components/header.php'; 
?>

<section class="book_section layout_padding" id="signup-section">
  <div class="container">
    <div class="heading_container">
      <h2>
        Sign-Up
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form action="../admin/php/createCustomer.php" method="POST">
            <div>
              <input type="text" class="form-control" placeholder="Your Name" name="name" required />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Your Password" name="password" required />
            </div>
            <div class="d-flex">
              <input type="text" class="form-control mr-1" placeholder="Phone Number" id="mobile" name="mobile" required />
              <button id="sendOTP" class="form-control ml-1 btn btn-success" style="margin-top: 0px;">Send OTP</button>
            </div>
            <div class="d-flex justify-content-center">
              <input type="text" class="form-control " placeholder="Enter OTP" name="otp" required />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Your Email" name="email" required />
            </div>
            <div class="d-flex">
              <input type="text" class="form-control mr-1" placeholder="Your Address" name="address" required />
              <input type="text" class="form-control ml-1" placeholder="Zip Code" name="zip" required />
            </div>
            <div class="btn_box">
              <button>
                Create
              </button>
              <button id="createBtn" name="createAccount">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
     
    </div>
  </div>
</section>
<section class="book_section layout_padding" id="signin-section" style="display: none">
  <div class="container">
    <div class="heading_container">
      <h2>
        Sign In
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form action="loginCheck.php" method="POST">
            <div>
              <input type="email" class="form-control" placeholder="Your Email" name="email" required />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Your Password" name="password" required />
            </div>
            <div class="btn_box d-flex mr-2">
              <button type="Submit">
                Submit
              </button>
              <button class="ml-2 btn btn-secondary bg-secondary" id="backBtn">
                Back
              </button>
            </div>
          </form>
        </div>
      </div>
     
    </div>
  </div>
</section>

<?php include './components/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
  $("#createBtn").click((e)=>{
    e.preventDefault();
    $("#signup-section").hide();
    $("#signin-section").show();
  })
  $("#backBtn").click(()=>{
    $("#signup-section").show();
    $("#signin-section").hide();
  })

  $("#sendOTP").click((e)=>{
    e.preventDefault();
    let number = $("#mobile").val();
      console.log(number)
      let url = "../admin/php/sendOTP.php?mobile="+number;
      console.log(url);
      $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        success: function (data) {
          let a = JSON.parse(data)
          
        },
        error: function (x) {
          console.log(url)
          console.log("req err");
        }
      })
    });
</script>