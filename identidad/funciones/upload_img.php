<?php

$PIN = $_POST['PIN'];
$ID = $_POST['ID'];

$key = hash_hmac('sha512',$ID, $PIN);

$imageMimeTypes = array(
  'image/png',
  'image/jpg',
  'image/jpeg',
  'image/gif'
);
$obj = new \stdClass(); // incializa variable como objeto
$img_validar = 1;
$img_existente = 1;
$img_size = 1;
$llave = 1;

$ruta = "./../imgs/";
// basename (files viene de post[atributo][ nombre de la imagen]  )
$imageName = basename($_FILES["imagen"]["name"]);
$sel_img = $ruta . $imageName;
$validar = 1;

// extension de la imagen
$extImg = strtolower(pathinfo($sel_img,PATHINFO_EXTENSION));
// tipo de imagen
$tipoImg = mime_content_type($_FILES["imagen"]["tmp_name"]);

// validar si es una imagen
if (in_array($tipoImg, $imageMimeTypes)){
  $validar = 1;
}
else {
  $validar = 0;//El archivo no es una imagen
  $img_validar = 0;
}
// echo "<br>Ruta de la imagen -> ".$sel_img; //flag

// validar si la imagen ya existe
if(file_exists($sel_img)){
  $validar = 0;//archivo ya existe
  $img_existente = 0;
}
// limitar tamaño de archivo 1mb
if($_FILES["imagen"]["size"] >1048576){// 1 * 1024 * 1024 = bytes
  $validar = 0;//archivo muy grande
  $img_size = 0;
}

// Subir archivo
if($validar == 1) {
  if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$sel_img)){
    // $respuesta =array(
    //   'post' => $_POST,
    //   'files' => $_FILES
    // );
    // echo json_encode($respuesta);

    //borra archivo imagen cambiar
    if (isset($_POST['flag'])) {
      unlink($file);
    }

    $validar = 1;
  }
  else {
    //Hubo un problema subiendo la imagen;

    $validar = 0;
  }
}
else {
  //El archivo no fue subido;
  $validar = 0;
}

// ---------------- HMAC ------------

$PIN = $_POST['PIN'];
$ID = $_POST['ID'];

$key = hash_hmac('sha512',$ID, $PIN);
$file = "".$key.".txt";
$myfile = fopen($file, "w");

if ($myfile) {
    fwrite($myfile, $key);
    $llave = 1;
}
else {
    $llave = 0;
}

// encode 64 imgs

$imageData = base64_encode($imageName);

// ------------- JSON ------------
  //Valores de respuesta 1 sin error, 0 error
  //  $obj->img_validar = $img_validar;
  // $obj->img_existente = $img_existente;
  // $obj->img_size = $img_size;
  // $obj->validar = $validar;
  $obj->b64 = $imageData;
  $obj->key = $key;

  if ($img_validar && $llave) {
      echo json_encode($obj);
  }
  else {
      echo 0;
  }


 ?>
