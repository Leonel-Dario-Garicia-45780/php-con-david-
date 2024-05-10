<?php
    include("../modelos/ProductoDAO.php");
    $productoDAO = new ProductosDAO();
    $mensage = $productoDAO->eliminarProducto($_GET['id']);
?>