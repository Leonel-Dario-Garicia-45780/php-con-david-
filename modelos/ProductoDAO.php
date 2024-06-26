<?php
    include ('../conexion/conexion.php');
    class ProductosDAO{
       public $id;
       public $nombre;
       public $descripcion;

       function __construct($id=null,$nombre=null,$descripcion=null){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
       } 

        function traerProducto(){
       
        $conn = new Conexion('localhost', 'root', '', 'crud_base_php');  /* variables de coneccion  */
        try {
            $conexion = $conn->Conectar();
            $stmt=$conexion->query('SELECT * from productos');
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
                
        } catch (PDOException $e) {
            echo "Error al conectarse ->" . $e;
        }
        }

       function eliminarProducto($id){
        $conn = new Conexion('localhost', 'root', '', 'crud_base_php');
        try {
            $conexion = $conn->Conectar();
            $stmt = $conexion->prepare("DELETE FROM productos WHERE id = $id");
            $stmt->execute();
            //! cambio esta parte para que devuleva una respuesta json
            return json_encode(array("message" => "Producto eliminado exitosamente")); 
        } catch (PDOException $e) {
            echo "Error al conectarse ->" . $e;
        }
       }
       
       function agregarProducto($id, $nombre,$descripcion){
        # cambios realizados con chat
        $conn = new Conexion('localhost', 'root', '', 'crud_base_php');
        try {
            $conexion = $conn->Conectar();
            $agregar = $conexion->prepare('INSERT INTO productos (id, nombre, descripcion) VALUES (:id, :nombre, :descripcion)');
            $agregar->bindParam(':id', $id, PDO::PARAM_INT);
            $agregar->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $agregar->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $agregar->execute();
            return "Producto agregado correctamente";

        } catch (PDOException $e) {
            echo "Error al conectarse ->" . $e;
        }

       }

       function actualizarProducto($id, $nombre, $descripcion) {
        $conexion = new Conexion('localhost', 'root', '', 'crud_base_php');
        try {
            $conn = $conexion->Conectar(); 
            $agregar = $conn->prepare("UPDATE productos SET nombre='$nombre', descripcion='$descripcion' WHERE id =$id");
            $agregar->execute();
            return "Actualizado Exitosamente";
        } catch(PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    function traer_un_Producto ($id){
        $conexion = new Conexion ('localhost', 'root', '', 'crud_base_php');
        try {
            $conn = $conexion->Conectar();
            $stmt = $conn->query("SELECT * FROM productos WHERE id={$id}");
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
            $conexion->cerrarConexion();
        } catch(PDOException $e) {
            echo "Error al conectarse ->".$e->getMessage();
        }
      }



    }
?>