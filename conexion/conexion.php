<?php
class Conexion{
    private $host;
    private $user;
    private $password;
    private $db;
    private $conexion;

    function __construct($hostaux,$useraux,$passwordaux,$dbaux){
        $this ->host=$hostaux;
        $this ->user=$useraux;
        $this ->password=$passwordaux;
        $this ->db=$dbaux;
    }
    public function Conectar(){
        try{
            $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
            # linea agregada por chat para el "prepare"
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
    } catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage();
    }}
    
}
?>