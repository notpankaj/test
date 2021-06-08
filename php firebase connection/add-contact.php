<?php 
   session_start();
include('./includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-mt-4">
                <div class="card-header">
                    <h4> Insert data in firebase
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                <?php
                    if(isset($_SESSION['status'])){
                        echo '<h4>'.$_SESSION['status'].'</h4>';
                        unset($_SESSION['status']);
                    }
                ?>


                    <div class="row justify-content-center">
                        <div class="col-md-6">


                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <label for="">First Name </label>
                                    <input type="text" name="firstname" class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name </label>
                                    <input type="text" name="lastname" class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Email </label>
                                    <input type="text" name="email" class="form-cotrol">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone no. </label>
                                    <input type="text" name="phone" class="form-cotrol">
                                </div>
                                <div class="form-group">
                                <button type="submit" name="save-data" class="btn btn-primary">Save</button></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('./includes/header.php'); ?>