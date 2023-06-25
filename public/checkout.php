<?php
    session_start();
?>
<h1>HI</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="ali" style="margin-left: 30%;"><div class="card bg-light mb-3 m-4 " style="width: 30rem; height: 50rem; ">
        <div class="card-header"><h2 class="text-center">Payment</h1></div>
        <div class="card-body">
          <h5 class="card-title">Payment Gateway</h5>
          <p class="card-text"><div class="mb-3">

            <form method="POST" action="pgRedirect.php" id="form">

                    <label for="exampleFormControlInput1" class="form-label" style="margin-left:0.75% ;">Order Id</label>
                <input value="<?php echo rand(1000,9999) ?>" name="ORDER_ID" type="text" class="form-control" id="=Order-Id" placeholder="Order Id">
                <br>
                <label for="exampleFormControlInput1" class="form-label"style="margin-left:0.75% ;">Customer Id</label>
                <input value="<?php echo $_SESSION['userID'] ?>" name="CUST_ID" type="text" class="form-control" id="Customer Id" placeholder="Customer Id">
                <br>
                <label for="exampleFormControlInput1" class="form-label"style="margin-left:0.75% ;">Industry Type</label>
                <input value="Retail" name="INDUSTRY_TYPE_ID" type="text" class="form-control" id="Industry Type" placeholder="Industry Type">
                <br>
                <label for="exampleFormControlInput1" class="form-label"style="margin-left:0.75% ;">Channel</label>
                <input value="WEB" name="CHANNEL_ID" type="text" class="form-control" id="Channel" placeholder="Channel">
                <br>
                <label for="exampleFormControlInput1" class="form-label"style="margin-left:0.75% ;"> Final Amount</label>
                <input value="<?php echo $_GET['amt'] ?>" name="TXN_AMOUNT" type="text" class="form-control" id="Final Amount" placeholder="Final Amount">
                <br>
                <input value="<?php echo $_GET['order_id'] ?>" name="TXN_AMOUNT" type="text" class="form-control" id="Final Amount" placeholder="Final Amount">
                <br>
                <div class="text-center m-5"> 
                    <button id="payBtn" type="button" class="btn btn-warning btn btn-lg" style="color: white;">Pay</button>
                </div>
            </form>
           
          </div></p>
        </div>
      </div></div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $("#payBtn").click((e)=>{
            e.preventDefault();
            let data = $('form').serialize();
            console.log(data);
            sessionStorage.setItem('data', data);
            
            $("#form").submit();
        })
    </script>
</body>
</html>
