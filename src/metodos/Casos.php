<?php 
include 'config.php';

class Casos
{
    private $nombre_caso;
    private $numero_programa;
    private $descripcion_caso;
    private $nombre_usuario;
    
    public function __construct($nombre_caso, $numero_programa, $descripcion_caso, $nombre_usuario) {
       $this->nombre_caso = $nombre_caso;
       $this->numero_programa = $numero_programa;
       $this->descripcion_caso = $descripcion_caso;
       $this->nombre_usuario = $nombre_usuario;
    }
 
    public function RegistroCasos(){
 
       $database = new Database();
       $conn = $database->connect();
 
        $buscar_user = "INSERT INTO casos(id_user_reg, nombre_caso, descripcion_caso, numero_programa, nombre_usuario)
                        VALUES(:id_user_reg, :nombre_caso, :descripcion_caso, :numero_programa, :nombre_usuario)";
        $stmt = $conn->prepare($buscar_user);
        $stmt->bindParam(':id_user_reg', $_SESSION['tools']['id_user']);
        $stmt->bindParam(':nombre_caso', $this->nombre_caso);
        $stmt->bindParam(':descripcion_caso', $this->descripcion_caso);
        $stmt->bindParam(':numero_programa', $this->numero_programa);
        $stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
        
        $stmt->execute();
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return 1;
 
    }

}




?>