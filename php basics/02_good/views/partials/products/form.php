  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger">
      <?php foreach ($error as $err) : ?>
        <div><?php echo $err ?></div>
      <?php endforeach; ?>
    </div>
  <?php } ?>

  <!-- FORM -->
  <form action="create.php" method="post" enctype="multipart/form-data">
    <!-- enctype for uploading files -->
    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <br>
      <input type="file" name="image">
    </div>
    <div class="mb-3">
      <label class="form-label">Product Title</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
      <labelclass="form-label">Description</labelclass=>
        <textarea class="form-control" name="description" value="<?php echo $description ?>"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Product Price</label>
      <input type="number" step="0.1" class="form-control" name="price" value="<?php echo $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>