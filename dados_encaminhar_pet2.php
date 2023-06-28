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
        $db = 'nuvem';  
        $user = 'root';  
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);
                
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
            
               
        $id = $_POST['id'];

        $sql = "INSERT INTO caches (id) VALUES ('$id')";
        if ($conn->query($sql) === TRUE) {
            
            header("Location: dados_encaminhar_pet.php");
            exit;
        }
        $conn->close();
    }

    
    ?>
          
</body>
</html>