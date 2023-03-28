<?php 

include 'metodos/config.php';

class User
{
    private $email;
    private $password;
    
    public function __construct($email, $password) {
       $this->email = $email;
       $this->password = $password;
    }
 
    public function inicio_session(){
 
       $database = new Database();
       $conn = $database->connect();
 
       $buscar_user = "SELECT COUNT(*) as contar FROM users WHERE username = :email or email = :email";
       $stmt = $conn->prepare($buscar_user);
       $stmt->bindParam(':email', $this->email);
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
       if ($row['contar'] == 1) {
          // hacer algo con los datos del usuario
         
          $buscar_user = "SELECT * FROM users WHERE username = :email and pass = :pass";
          $stmt = $conn->prepare($buscar_user);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':pass', $this->password);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
          session_start();
 
          $_SESSION['tools']['id_user'] = $row['id'];
         
          return 1;
  
       } else {
          // mostrar un mensaje de error
          echo "Usuario  no se encuentra en la base de datos";
          return 0;
       }
 
 
    }
}




?>