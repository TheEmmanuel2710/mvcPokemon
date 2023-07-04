<?php
include_once '../model/producto.php';
$id = $_POST["id"];
$productoM = new Modelo\Producto();
$result = $productoM->readOne($id);
echo json_encode($result);
unset($productoM);
?>