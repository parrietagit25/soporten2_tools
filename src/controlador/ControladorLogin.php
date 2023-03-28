<?php 

include ('metodos/Metodos.php');

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

/*
echo '<pre>';
var_dump($_POST);
echo '</pre>';

*/