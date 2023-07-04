<?php
include_once '../model/producto.php';

$id = $_POST["id"];
$nombrePro = $_POST["txtNombreEditar"];
$precioPro = $_POST["txtPrecioEditar"];
$cantidadPro = $_POST["txtCantidadEditar"];
$descripPro = $_POST["txtDescripcionEditar"];

$productoM = new Modelo\Producto();

$productoM ->setId($id);
$productoM ->setNombre($nombrePro);
$productoM ->setPrecio($precioPro);
$productoM ->setCantidad($cantidadPro);
$productoM ->setDescripcion($descripPro);
$reponse=$productoM->update();
echo json_encode($reponse);
unset($productoM);
unset($reponse);
?>