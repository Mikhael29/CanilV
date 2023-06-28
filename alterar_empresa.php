<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canil";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $telefone = $_POST["telefone"];
    $novaSenha = $_POST["nova_senha"];
    $confirmarSenha = $_POST["confirmar_senha"];


    $sql = "SELECT * FROM cadastro_empresa WHERE email = '$email' AND nome = '$nome' AND cnpj = '$cnpj' AND telefone = '$telefone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        if ($novaSenha !== $confirmarSenha) {
            echo "As senhas não correspondem.";
        } else {

            $sql = "UPDATE login SET senha = '$novaSenha' WHERE email = '$email'";
            if ($conn->query($sql) === TRUE) {
                echo "Senha alterada com sucesso.";
            } else {
                echo "Erro ao alterar senha: " . $conn->error;
            }
        }
    } else {
        echo "Os dados fornecidos não correspondem aos dados na tabela cadastro_empresa.";
    }
}

$conn->close();
?>