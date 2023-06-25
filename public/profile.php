<?php include './components/header.php'; ?>
<?php
?>
<style type="text/css">
  *{
  }
</style>
<?php
  $id = $_SESSION['userID'];
  $sql = "SELECT * FROM `_customers` WHERE `customer_id`= $id";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    $user = mysqli_fetch_array($res);
  }
?>
      
<div class="container mt-5 mb-5 pt-3 pt-4">
  <div class="row d-flex">
    <div class="col col-lg-4">
      <div class="card">
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" width=200  src="./images/user.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $user['name'] ?></h5>
          <p class="card-text">
            <?php echo $user['created_on'] ?>
          </p>
          
        </div>
      </div>
      </div>
    </div>
    <div class="col col-lg-8">
      <form class="form">
        <fieldset class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $user['name'] ?>">
        </fieldset>
        <fieldset class="form-group">
          <label>email</label>
          <input type="text" name="name" class="form-control" value="<?php echo $user['email'] ?>">
        </fieldset>
        <fieldset class="form-group">
          <label>Mobile</label>
          <input type="text" name="name" class="form-control" value="<?php echo $user['mobile'] ?>">
        </fieldset>
        <fieldset class="form-group">
          <label>Address</label>
          <input type="text" name="name" class="form-control" value="<?php echo $user['address'] ?>">
        </fieldset>
        <fieldset class="form-group">
          <button class="btn btn-primary">Update</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
       
<?php include './components/footer.php'; ?>