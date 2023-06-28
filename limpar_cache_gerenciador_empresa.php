<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['truncate'])) {
    $host = 'localhost';
    $db = 'canil';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $truncate_caches_pet = "TRUNCATE TABLE caches_pet";
    if ($conn->query($truncate_caches_pet) === TRUE) {
        $conn->close();
        header('Location: gerenciador_posteres_empresa.php');
        exit();
    } else {
        die("Erro ao executar o TRUNCATE TABLE: " . $conn->error);
    }
}
?>
   
</body>
</html>