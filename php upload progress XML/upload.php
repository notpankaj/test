<?php

print_r($_FILES);

$storeage = 'uploads/'. basename($_FILES['file']['name']);

move_uploaded_file($_FILES['file']['tmp_name'],$storeage);

echo "done";