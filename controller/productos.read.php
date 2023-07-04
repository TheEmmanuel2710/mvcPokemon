<?php
include_once "../model/producto.php";
$productoM = new Modelo\Producto();
$result = $productoM->read();

echo json_encode($result);
unset($productoM);
unset($result);
?>
