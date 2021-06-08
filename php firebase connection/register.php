<?php include('./includes/header.php'); ?>


<form action="code.php" method="POST" style='padding:4rem'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">full name</label>
      <input type="fullname" name='fullname' class="form-control" id="inputEmail4" >
    </div>
    
  </div>
  <div class="form-group">
    <label for="inputAddress">email</label>
    <input type="email" name="email" class="form-control" id="inputAddress" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">phone</label>
    <input type="text" name="phone" class="form-control" id="inputAddress2" >
  </div>
  
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
    
  <button type="submit" name='register-user' class="btn btn-primary">register</button>
</form>



<?php include('./includes/footer.php'); ?>