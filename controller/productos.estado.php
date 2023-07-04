<?php
include_once "../model/producto.php";
$id=$_POST["id"];
$estado=$_POST["estado"];
if ($estado=="A") {
    $estado='I';
}else {
    $estado='A';   
}

$ProductoM=new Modelo\Producto();
$ProductoM->setId($id);
$ProductoM->setEstado($estado);
$result=$ProductoM->estado();

echo json_encode($result);
unset($ProductoM);
unset($result);

?>