<?php
include_once '../model/producto.php';
$id = $_POST["id"];
$productoM = new Modelo\Producto();
$productoM ->setId($id);
$reponse=$productoM->delete();
echo json_encode($reponse);
unset($productoM);
unset($reponse);
?>