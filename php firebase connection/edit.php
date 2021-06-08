<?php 
   include('./includes/header.php');
   include('./dbconfig.php');
   $id = $_GET['id'] ?? null;

   if($id){

      $editData = $database->getReference('contacts')->getChild($id)->getValue();
   }else{
      header('Location: index.php');
      exit;
   }

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-mt-4">
                <div class="card-header">
                    <h4> Update data
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">


                            <form action="code.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                                <div class="form-group">
                                    <label for="">First Name </label>
                                    <input type="text" name="firstname" value='<?php echo $editData['firstname'] ?>' class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name </label>
                                    <input type="text" name="lastname" value='<?php echo $editData['lastname'] ?>' class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="text" name="email" value='<?php echo $editData['email'] ?>' class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone no. </label>
                                    <input type="text" name="phone" value='<?php echo $editData['phone'] ?>' class="form-cotrol">
                                </div>
                                <div class="form-group">
                                <button type="submit" name="update-data" class="btn btn-primary">update</button></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./includes/header.php'); ?>