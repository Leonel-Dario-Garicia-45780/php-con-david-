<?php
    include('../modelos/ProductoDAO.php');
    $productoDAO = new ProductosDAO();
    $productos = $productoDAO->traerProducto();
    
    /*  esto es para que los cataracteres no generen problema, como la ñ  */
    $i=0;
    foreach( $productos as $value){
        $productos[$i]['nombre']=utf8_encode($value['nombre']);
        $i=$i+1;
    }
    /*  fin  */
    
    print_r(json_encode($productos));
?>