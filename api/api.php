<?php
    include("../modelos/ProductoDAO.php");
    header("Acces-Control-Allow-Origin: *");
    
    header("Content-Type: application/json");
    $method = $_SERVER['REQUEST_METHOD'];
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
    //     $clases = $class->guardarProducto($data['nombre'],$data['descripcion']);
    //     echo(json_encode($clases))

    // } 
*/

switch ($method) {
    case 'GET':
        $data = $class->traerProducto();
        echo(json_encode($data));
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'),true);
        $resultado = $class->agregarProducto($data['id'], $data['nombre'],$data['descripcion']);
        echo(json_encode($resultado));
        break;
    
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'),true);
        $resultado = $class->eliminarProducto($data['id']/* ,$data['descripcion'] */);
        echo(json_encode($resultado));
        break;
    
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'),true);
        $resultado = $class->actualizarProducto($data['id'],$data['nombre'],$data['descripcion']);
        echo(json_encode($resultado));
        break;
    
    default:
        http_response_code(405);
        echo json_encode(array("message"=>"Metodo no permitido"));
        break;
}


?>