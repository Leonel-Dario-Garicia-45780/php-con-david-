<?php
    include("../modelos/ProductoDAO.php");
    $productoDAO = new ProductosDAO();

if ($_REQUEST['id']=='') {
    $productoDAO->agregarProducto($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['descripcion']);
}else{
    $productoDAO->actualizarProducto($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion']);
}

?>