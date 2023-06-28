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

 
    $sql = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo '<form action="alterar_usuario.php" method="POST">';
        echo '<h2>Confirme os dados da sua conta:</h2>';
        echo '<input type="hidden" name="email" value="' . $email . '">';
        echo 'Nome: <input type="text" name="nome"><br>';
        echo 'CPF: <input type="text" name="cpf"><br>';
        echo 'Telefone: <input type="text" name="telefone"><br>';
        echo 'Nova Senha: <input type="password" name="nova_senha"><br>';
        echo 'Confirmar Senha: <input type="password" name="confirmar_senha"><br>';
        echo '<input type="submit" value="Alterar Senha">';
        echo '</form>';
    } else {

        $sql = "SELECT * FROM cadastro_empresa WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            echo '<form action="alterar_empresa.php" method="POST">';
            echo '<h2>Confirme os dados da sua conta:</h2>';
            echo '<input type="hidden" name="email" value="' . $email . '">';
            echo 'Nome da Empresa: <input type="text" name="nome"><br>';
            echo 'CNPJ: <input type="text" name="cnpj"><br>';
            echo 'Telefone: <input type="text" name="telefone"><br>';
            echo 'Nova Senha: <input type="password" name="nova_senha"><br>';
            echo 'Confirmar Senha: <input type="password" name="confirmar_senha"><br>';
            echo '<input type="submit" value="Alterar Senha">';
            echo '</form>';
        } else {
            echo 'Email não encontrado.';
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Esqueci Senha</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
           
            min-height: 100vh;
        
          
        }
    </style>

</head>
<body>
    <h2>Esqueci minha senha</h2>
    <form method="POST" action="">
        Digite o email que deseja recuperar a senha: <input type="text" name="email"><br>
        <input type="submit" value="Recuperar Senha">
    </form>
</body>
</html>

