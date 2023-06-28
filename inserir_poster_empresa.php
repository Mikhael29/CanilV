<?php

session_start();
include('validar_usuario.php');
include('conexao.php');

$email = $_SESSION['email'];

$select = "SELECT email FROM login WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dado = mysqli_fetch_row($query);



$mensagem = "";
$error_mensagem = "";
?>

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
       
    }
       
    
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        
        
        $nomepet = $_POST['nomepet'];
        $especie = $_POST['especie'];
        $porte = $_POST['porte'];
        $sexo = $_POST['sexo'];
        $obs = $_POST['obs'];
        

        
        $nomeImagem = $_FILES['imagem']['name'];
        $caminhoTemporario = $_FILES['imagem']['tmp_name'];
        
    
        
        $conteudoImagem = file_get_contents($caminhoTemporario);
        
        $selectUser = "SELECT id FROM cadastro_empresa WHERE email = '$email'";
        $queryUser = mysqli_query($conexao, $selectUser);
        $rowUser = mysqli_fetch_assoc($queryUser);
        $id = $rowUser['id'];

    
        
        $sql = "INSERT INTO pets_empresa (nome, arquivo, nomepet, especie, porte, sexo, obs, id) VALUES (?, ?,'$nomepet', '$especie', '$porte', '$sexo', '$obs', '$id')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nomeImagem, $conteudoImagem);
    
        
        if ($stmt->execute()) {
            $mensagem = "Poster inserido com sucesso!";
        } else {
        echo "Erro ao armazenar a imagem no banco de dados: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    
                    
?>




<!DOCTYPE html>
<html>
<head>
    <title>Inserir poster</title>
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
<body>

    <div class="container">

        <h2>Inserir poster</h2>
            <?php if (!empty($mensagem)): ?>
                <div id="success-message" class="message">
                <p><?php echo $mensagem; ?></p>
                </div>
            <?php endif; ?>
        
            <?php if (!empty($error_mensagem)): ?>
                <div id="error-message" class="error-message">
                <p><?php echo $error_mensagem; ?></p>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <label>Insira a foto do pet</label>        
                <input type="file" name="imagem"><br><br>  
                <label>Nome do pet:</label>
                <input type="text" name="nomepet" required><br><br>
                <label>Especie:</label>
                <input type="text" name="especie" required><br><br>
                <label>Porte:</label>
                <input type="text" name="porte" required><br><br>
                <label>Sexo:</label>
                <input type="text" name="sexo" required><br><br>
                <label>Alguma observação? doenção? deficiencia?</label><br><br>
                <input type="text" name="obs" required><br><br>
                <input type="submit" value="enviar">
            
        
            <a href="menu_empresa.php">Voltar</a>
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
</body>
</html>