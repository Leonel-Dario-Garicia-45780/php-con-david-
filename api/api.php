<?php
    include("../modelos/ProductoDAO.php");
    header("Content-Type: application/json");
    $method = $_SERVER['REQUEST_METHOD']
    $class= new ProductosDAO();
#! ESTO ES CON IF
/*     // if ($method == 'GET'){
    //     $class= new ProductosDAO();
    //     $clases = $class->traerProducto();
    //     echo(json_encode($clases))
    // }

    // if ($method == 'POST'){

    //     $class= new ProductosDAO();
    //     $data = json_decode(file_get_contents('php://input'),true);
    //     $clases = $class->guardarProducto($_data['nombre'],$_data['descripcion']);
    //     echo(json_encode($clases))

    // } 
*/

    switch ($method) {
        case 'GET':
            # code...
            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input'),true);
            $clases = $class->guardarProducto($_data['nombre'],$_data['descripcion']);
            echo(json_encode($clases))
            break;
        
        default:
            # code...
            break;
    }


?>