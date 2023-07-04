<?php
// create_product.php
include_once "../model/producto.php";

$productoM = new Modelo\Producto();
$productoM->setNombre($_POST["txtNombreP"]);
$productoM->setPrecio($_POST["txtPrecio"]);
$productoM->setCantidad($_POST["txtCantidad"]);
$productoM->setDescripcion($_POST["txtDescripcion"]);
$result = $productoM->create();

echo json_encode($result);

unset($productoM);

?>