<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            background-position: center;
        }


        body {
            font-family: Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-position: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .company-card {
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
            background-color: #3E9AAB;
            color: white;
        }

        .company-card h3 {
            margin-bottom: 10px;
        }

        .company-card p {
            margin: 5px 0;
        }

        .select-form {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <a href="menu_empresa.php">Voltar</a>
    <br><br><br>

    <?php
    session_start();
    include('validar_usuario.php');
    include('conexao.php');

    $email = $_SESSION['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canil";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    
    $selectUser = "SELECT id FROM cadastro_empresa WHERE email = '$email'";
    $queryUser = mysqli_query($conexao, $selectUser);
    $rowUser = mysqli_fetch_assoc($queryUser);
    $id = $rowUser['id'];

    $conn->close();

    $host = 'localhost';
    $db = 'nuvem';
    $user = 'root';
    $pass = '';

    $connNuvem = new mysqli($host, $user, $pass, $db);
    

    if ($connNuvem->connect_error) {
        die("Falha na conexão com o banco de dados: " . $connNuvem->connect_error);
    }

    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        $deleteQuery = "DELETE FROM dados WHERE id_dados = $delete_id";

        if ($connNuvem->query($deleteQuery) === TRUE) {
            echo "Dados excluídos com sucesso.";
        } else {
            echo "Erro ao excluir dados: " . $connNuvem->error;
        }
        
    }

    $sql = "SELECT id_dados, nome, cpf, cidade, estado, cep, telefone, email, especie, porte, sexo, obs FROM dados WHERE id = $id";
    $result = $connNuvem->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_dados = $row['id_dados'];
            $nome = $row['nome'];
            $cpf = $row['cpf'];
            $cidade = $row['cidade'];
            $estado = $row['estado'];
            $cep = $row['cep'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $especie = $row['especie'];
            $porte = $row['porte'];
            $sexo = $row['sexo'];
            $obs = $row['obs'];

            echo '<div class="container">' . '<div class="company-card ">' . '<p>' . 'Nome: ' . $nome . '</p>';
            echo '<p>' . 'CPF: ' . $cpf . '</p>';
            echo '<p>' . 'cidade: ' . $cidade . '</p>';
            echo '<p>' . 'Estado: ' . $estado . '</p>';
            echo '<p>' . 'CEP: ' . $cep . '</p>';
            echo '<p>' . 'Telefone: ' . $telefone . '</p>';
            echo '<p>' . 'Email: ' . $email . '</p>';
            echo '<p>' . 'Especie: ' . $especie . '</p>';
            echo '<p>' . 'Porte: ' . $porte . '</p>';
            echo '<p>' . 'Sexo: ' . $sexo . '</p>';
            echo '<p>' . 'Obs: ' . $obs . '</p>';
            echo '<a href="mailto:' . $email . '?subject=Quero adotar seu pet.& ' . $email . '"> Entrar em contato por email</a>';
            echo '<br>';
            echo '<a href="ver_formularios.php?delete_id=' . $id_dados . '" onclick="return confirm(\'Tem certeza que deseja deletar?\')">DELETAR</a>';
            echo '</div>';
        }
    } else {
        echo "Nenhum formulário recebido.";
    }

    $connNuvem->close();
    ?>


</body>

</html>