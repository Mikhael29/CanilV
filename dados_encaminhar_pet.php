<?php
session_start();
include('validar_usuario.php');
include('conexao.php');

$mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $host = 'localhost';  
        $db = 'nuvem';  
        $user = 'root';  
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
            
        $sql = "SELECT ordem FROM caches";
        $sql = "SELECT ordem FROM caches ORDER BY ordem DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ordem = $row['ordem'];
        $sql = "SELECT id FROM caches WHERE ordem = $ordem";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];



            
            $id = $row['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $especie = $_POST['especie'];
            $porte = $_POST['porte'];
            $sexo = $_POST['sexo'];
            $obs = $_POST['obs'];

            $sql = "INSERT INTO dados (id, nome, cpf, cidade, estado, cep, telefone, email, especie, porte, sexo, obs) VALUES ('$id', '$nome', '$cpf', '$cidade', '$estado', '$cep', '$telefone', '$email', '$especie', '$porte', '$sexo', '$obs')";

            if ($conn->query($sql) === TRUE) {
                $mensagem = "Formulário enviado com sucesso!<br>";
                
                
                $sql = "TRUNCATE caches";
                if ($conn->query($sql) === TRUE) {
                    //echo "cache limpado com sucesso.";
                } else {
                    echo "Erro ao limpar o cache: " . $conn->error;
                }
            } else {
                echo "Erro ao enviar o formulário, tente novamente! " . $conn->error;
            }

            $conn->close();
        }

?>


<!DOCTYPE html>
<html>
<head>  
<title>Dados encaminhar Pet</title>
<style>
    body {
    background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #FFD84D;
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container {
    border-radius: 10px;
    padding: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
    background-color: #3E9AAB;
}

h2 {
    font-size: 24px;
    color: #FFC041;
    margin: 0 0 20px;
}

label {
    font-weight: bold;
    color: #FFC041;
    font-size: 14px;
    display: block;
    text-align: left;
    margin-bottom: 5px;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 4px;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #FFD84D;
}

a {
    color: #FFC041;
    text-decoration: none;
}

.back-link {
    display: inline-block;
    margin-top: 20px;
    color: #FFC041;
    text-decoration: none;
    background-color: #4CAF50;
    padding: 10px 20px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.back-link:hover {
    background-color: #FFD84D;
}

.user-email {
    color: black;
    font-size: 14px;
    margin-bottom: 20px;
}

.nome_email {
    background-color: #3E9AAB;
    color: white;
    border-radius: 10px;
    padding: 10px;
    width: 50%;

}

.message {
        background-color: #4caf50;
        font-size: 15px;
        font-family: Arial, sans-serif;
        border-radius: 4px;
        padding: 10px;
        margin-top: 20px;
        text-align: center;
      }
</style>
</head>
<body
<center>
 <div class="container">
    <h2>Encaminhar pet</h2>
        <?php if (!empty($mensagem)): ?>
            <div id="success-message" class="message">
                <p><?php echo $mensagem; ?></p>
            </div>
        <?php endif; ?>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label>Nome completo:</label>  
                <input type="text" name="nome" required><br><br>
                <label>CPF:</label>
                <input type="text" name="cpf" required><br><br>
                <label>Cidade:</label>
                <input type="text" name="cidade" required><br><br>
                <label>Estado:</label>
                <input type="text" name="estado" required><br><br>
                <label>Cep:</label>
                <input type="text" name="cep" required><br><br>
                <label>Telefone:</label>
                <input type="text" name="telefone" required><br><br>
                <label for="nome_email">Email:</label>
                <input type="text" name="email" required><br><br>
                <label>Especie:</label>
                <input type="text" name="especie" required><br><br>
                <label>porte:</label>
                <input type="text" name="porte" required><br><br>
                <label>sexo:</label>
                <input type="text" name="sexo" required><br><br>
                <label>Alguma atenção especial?:</label>
                <input type="text" name="obs" required><br><br>
                <input type="submit" value="Enviar">
            
                
                <a href="menu_usuario.php">Voltar</a>
    </form>
    </div>
    <script>
      function hideMessages() {
        var errorDiv = document.getElementById('error-message');
        var successDiv = document.getElementById('success-message');
  
        if (errorDiv && errorDiv.style.display !== 'none') {
          setTimeout(function() {
            errorDiv.style.display = 'none';
          }, 3000);
        }
  
        if (successDiv && successDiv.style.display !== 'none') {
          setTimeout(function() {
            successDiv.style.display = 'none';
          }, 3000);
        }
      }
      document.addEventListener('DOMContentLoaded', hideMessages);
    </script>
</center>
</body>
</html>                                                  