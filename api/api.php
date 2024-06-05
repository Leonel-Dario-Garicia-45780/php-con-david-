<?php
    include("../modelos/ProductoDAO.php");
    // !  headers y configuraciones que me dio chat (yo no sabia de esto)
    header("Access-Control-Allow-Origin: http://localhost:5173"); // Ajusta el origen según corresponda
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); //! esto pues son los tipos de peticiones ya corregidos
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Content-Type: application/json");

    //! esto tanbien
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }


    $method = $_SERVER['REQUEST_METHOD'];
    $class= new ProductosDAO();

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

?>