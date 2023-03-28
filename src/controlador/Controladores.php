<?php 

include ('../metodos/Casos.php');

class Usuario
{
    public function login(){

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $loguin = new User($email, $password);
            $resultados = $loguin->inicio_session(); 
   
            if ($resultados == 1) {
   
                header('Location: paginas/principal.php');
   
            }else{
   
               echo "Usuario  no se encuentra en la base de datos";
   
            }
   
         }else{
   
            echo 'Nada por aca';
         }

    }
    
}

class CasosControlador
{
    public function registroCaso(){
    
        if (isset($_POST['registro_caso'])) {

            $nombre_caso = $_POST['nombre_caso'];
            $numero_programa = $_POST['numero_programa'];
            $descripcion_caso = $_POST['descripcion_caso'];
            $nombre_usuario = $_POST['nombre_usuario'];

            $casos = new Casos($nombre_caso, $numero_programa, $descripcion_caso, $nombre_usuario);
            $resultados = $casos->RegistroCasos(); 

            if ($resultados == 1) {
                
                $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registro realizado!</strong> .
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

              return $mensaje;

            }else{

                $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Registro [no se realizo!</strong> .
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

              return $mensaje;

            }

         }

    }

    public function verCasos(){

        $database = new Database();
        $conn = $database->connect();
        $registros =[];
        $select_casos = "SELECT 
                            c.id, 
                            c.fecha_reg, 
                            c.nombre_caso, 
                            c.descripcion_caso, 
                            c.numero_programa, 
                            c.nombre_usuario, 
                            u.nombre, 
                            u.apellido
                         FROM casos c inner join users u on c.id_user_reg = u.id";
        $stmt = $conn->prepare($select_casos);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $registros[] = $row;
        }
        return $registros;

    }

    public function eliminarCaso($id){

        $database = new Database();
        $conn = $database->connect();
        $select_casos = "DELETE FROM casos WHERE id = $id";
        $stmt = $conn->prepare($select_casos);
        $stmt->execute();
        echo 'Registro Eliminado';

    }
    
}

/*
echo '<pre>';
var_dump($_POST);
echo '</pre>';

*/