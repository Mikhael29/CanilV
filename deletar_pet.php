<?php
session_start();
include('validar_usuario.php');
include('conexao.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canil";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id_pets = $_GET['id'];


    $sql = "DELETE FROM pets WHERE id_pets = $id_pets";
    $result = $conn->query($sql);

    if ($result) {
        echo "Registro deletado com sucesso!";
    } else {
        echo "Erro ao deletar o registro: " . $conn->error;
    }
}

$conn->close();
?>
