<?php

require __DIR__.'/vendor/autoload.php';  

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('./phpcrud-38a16-firebase-adminsdk-kev6u-eebe9380f8.json')
                        ->withDatabaseUri('https://phpcrud-38a16-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

use Kreait\Firebase\Auth;  //auth class
$auth = $factory->createAuth(); //initizizing auth