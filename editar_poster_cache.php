<?php
session_start();
include('validar_usuario.php');
include('conexao.php');
$email = $_SESSION['email'];

$select = "SELECT email FROM login WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dado = mysqli_fetch_row($query);
echo $dado[0];


?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost';  
        $db = 'canil';  
        $user = 'root';  
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);
                
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
            
               
        $id_pets = $_POST['id_pets'];

        $sql = "INSERT INTO caches_pet (id_pets) VALUES ('$id_pets')";
        if ($conn->query($sql) === TRUE) {
            
            header("Location: editar_poster.php");
            exit;
        }
        $conn->close();
    }

    
    ?>
          
</body>
</html>