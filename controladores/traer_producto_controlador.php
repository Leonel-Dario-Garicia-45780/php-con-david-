<?php
    include('../modelos/ProductoDAO.php');
    $productoDAO = new ProductosDAO();
    $productos = $productoDAO->traer_un_Producto($_GET['id']);
    
    print_r(json_encode($productos));
?>