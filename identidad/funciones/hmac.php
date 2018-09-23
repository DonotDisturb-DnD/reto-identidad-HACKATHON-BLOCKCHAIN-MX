<?php
// $PIN = 1234;
// $ID = "hola";

$PIN = $_POST['PIN'];
$ID = $_POST['ID'];

$key = hash_hmac('sha512',$ID, $PIN);


$file = "".$key.".txt";

//ENCODEAR IMAGEN 64

//IPFS INSERTION


// echo $key;
// echo "<br>".$file;
//
$myfile = fopen($file, "w");

if ($myfile) {

    fwrite($myfile, $key);
    echo 1;
}
else {
    echo 0;
}



 ?>
