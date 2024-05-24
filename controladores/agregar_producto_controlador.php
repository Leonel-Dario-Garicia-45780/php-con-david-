<?php
     include("../modelos/ProductoDAO.php");
     $productoDAO = new ProductosDAO();
     $mensage = $productoDAO->agregarProducto($_GET['id'], $_GET['nombre'], $_GET['descripcion'])

?>