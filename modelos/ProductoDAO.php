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
            return "Exito";  
        } catch (PDOException $e) {
            echo "Error al conectarse ->" . $e;
        }
       }
       
       function agregarProducto($id, $nombre,$descripcion){
        $conn = new Conexion('localhost', 'root', '', 'crud_base_php');
        try {
            $conexion = $conn->Conectar();
            $agregar = $conn->prepare("INSERT INTO productos (`id`, `nombre`, `descripcion`) VALUES (?, ?, ?)");
            $agregar->bindParam(1, $id);
            $agregar->bindParam(2, $nombre);
            $agregar->bindParam(3, $descripcion);
            $agregar->execute();

        } catch (PDOException $e) {
            echo "Error al conectarse ->" . $e;
        }


       }




    }
?>