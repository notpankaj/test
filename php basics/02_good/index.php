<?php
/*=================
connection to db string
===================*/
$pdo = require_once './database.php';



/*=================
seach products
===================*/
$search =  $_GET['search']  ?? '';

if($search){

$statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
//bind parameter
$statement->bindValue(':title',"%$search%");
}else{
$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
};


$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<?php include_once './views/partials/header.php' ?>





    <h1>Product CRUD</h1>
    <!-- Create Products -->
    <p>
        <a href="create.php" class="btn btn-success">Add Product</a>
    </p>

<!-- search form -->

<form action="">
<div class="input-group mb-3">
  <input type="text" class="form-control" value="<?php echo $search ?>" placeholder="search for prosucts" name='search'>
<div class="input-group-append">
  <button class="btn btn-outline-secondary" type="submit">search</button>
</div>
</div>
s</form>


<!-- TABLE START -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
    <!-- PHP TABLE ROW -->
    <?php
    foreach($products as $i => $product){ 
    ?>
        <tr>
            <th scope="row"><?php echo $i + 1?></th>
            <td><img src="<?php echo $product['image'] ?>" class="thum-img"></td>
            <td><?php echo $product["title"] ?></td>
            <td><?php echo $product["price"] ?></td>
            <td><?php echo $product["create_date"] ?></td>
            <td>
            <a href="edit.php?id=<?php echo $product['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>

            <!-- <form style="display:inline-block" method="post" action="delete.php">
              <input  type="hidden" name="id" value="<?php echo $product['id'] ?>">
              <button" type="submit" class="btn btn-sm btn-outline-danger">Delete</a>
            </form> -->
            <!-- or -->
            <a href="delete.php?id=<?php echo $product['id'] ?>" type="button" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
            
        </tr>
    
    <?php } ?>
    <!-- PHP TABLE ROW -->
  </tbody>
</table>
<!-- TABLE END -->
  </body>
</html>