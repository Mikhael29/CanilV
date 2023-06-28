<?php
session_start();
include('validar_usuario.php');
include('conexao.php');
$email = $_SESSION['email'];


?>
 
 

<!DOCTYPE html>
<html>
<head>
    <title>Inserir poster</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    
    <div class="container">
    <h2>Insira informações do seu pet</h2>
  
    
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
        
        $selectUser = "SELECT id FROM cadastro_usuario WHERE email = '$email'";
        $queryUser = mysqli_query($conexao, $selectUser);
        $rowUser = mysqli_fetch_assoc($queryUser);
        $id = $rowUser['id'];

    
        
        $sql = "INSERT INTO pets (nome, arquivo, nomepet, especie, porte, sexo, obs, id) VALUES (?, ?,'$nomepet', '$especie', '$porte', '$sexo', '$obs', '$id')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nomeImagem, $conteudoImagem);
    
        
        if ($stmt->execute()) {
        echo "Poster inserido com sucesso!";
        } else {
        echo "Erro ao armazenar a imagem no banco de dados: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    
                    
        ?>
        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label>Insira a foto do pet</label>        
            <input type="file" name="imagem"><br> 
            <label>Nome do pet:</label>
            <input type="text" name="nomepet"  required><br>
            <label>Especie:</label>
            <input type="text" name="especie" required><br>
            <label>Porte:</label>
            <input type="text" name="porte"  required><br>
            <label>Sexo:</label>
            <input type="text" name="sexo"  required><br>
            <label>Alguma observação? doença? deficiencia?</label><br>
            <input type="text" name="obs" required><br>
            <input type="submit" value="enviar">
        
        </form>            
        </form>
        <br><br>
        <a href="menu_usuario.php">Voltar</a>
        
    </div>
   
       
    </body>
    </html>