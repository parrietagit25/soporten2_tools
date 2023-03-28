<?php 

include ('../metodos/Reglas.php');

class ReglasControlador
{
    public function registroRegla(){
    
        if (isset($_POST['registro_regla'])) {

            $nombre_regla = $_POST['nombre_regla'];
            $descripcion_regla = $_POST['descripcion_regla'];

            $reglas = new Reglas($nombre_regla, $descripcion_regla);
            $resultados = $reglas->RegistroReglas(); 

            if ($resultados == 1) {
                
                $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registro realizado!</strong> .
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

              return $mensaje;

            }else{

                $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Registro no se realizo!</strong> .
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

              return $mensaje;

            }

         }

    }

    public function verReglas(){

        $database = new Database();
        $conn = $database->connect();
        $registros =[];
        $select_casos = "SELECT 
                            r.id, 
                            r.fecha, 
                            r.nombre as nombre_regla, 
                            r.descripcion, 
                            u.nombre, 
                            u.apellido
                         FROM reglas r inner join users u on r.id_user = u.id";
        $stmt = $conn->prepare($select_casos);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $registros[] = $row;
        }
        return $registros;
    }
    
}

/*
echo '<pre>';
var_dump($_POST);
echo '</pre>';

*/