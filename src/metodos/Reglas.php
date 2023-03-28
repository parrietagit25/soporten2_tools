<?php 

include '../metodos/config.php';
class Reglas
{
    private $nombre_regla;
    private $descripcion_regla;
    
    public function __construct($nombre_regla, $descripcion_regla) {
       $this->nombre_regla = $nombre_regla;
       $this->descripcion_regla = $descripcion_regla;
    }
 
    public function RegistroReglas(){
 
       $database = new Database();
       $conn = $database->connect();
 
        $buscar_user = "INSERT INTO reglas(nombre, descripcion, id_user)
                        VALUES(:nombre_regla, :descripcion_regla, :id_user_reg)";
        $stmt = $conn->prepare($buscar_user);
        $stmt->bindParam(':id_user_reg', $_SESSION['tools']['id_user']);
        $stmt->bindParam(':nombre_regla', $this->nombre_regla);
        $stmt->bindParam(':descripcion_regla', $this->descripcion_regla);
        
        $stmt->execute();
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return 1;
 
    }


}

?>