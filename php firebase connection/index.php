<?php
include("./dbconfig.php");
?>

<!-- html -->
<?php include('./includes/header.php'); ?>

<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="card my-3">
                <div class="card-body">
                    <h5>Total Records:</h5>
                    <?php
                        $n = $database->getReference('contacts')->getSnapshot()->numChildren();
                        echo $n;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-9 my-3 text-end">
            <a href="login.php" class="btn btn-success">Login</a>
            <a href="register.php" class="btn btn-primary">Register</a>
        </div>

        <div class="col-md-12">
            <div class="card-mt-4">
                <div class="card-header">
                    <h4>firbase fetch
                        <a href="add-contact.php" class="btn btn-primary float-end">ADD</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr> -->
                            <?php
                            $dataRef = $database->getReference('contacts');
                            $data = $dataRef->getValue();
                            $index = 1;
                            ?>
                            <?php foreach ($data as $key => $person) : ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo $person['firstname'] ?></td>
                                    <td><?php echo $person['lastname'] ?></td>
                                    <td><?php echo $person['email'] ?></td>
                                    <td><?php echo $person['phone'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $key ?>" class="btn btn-success" style="display:inline-block">Edit</a>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $key ?>">
                                            <button type="submit" name='delete-data' class="btn btn-danger" style="display:inline-block">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('./includes/header.php'); ?>