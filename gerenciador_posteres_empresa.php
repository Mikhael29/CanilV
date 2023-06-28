<!DOCTYPE html>
<html>

<head>
    <style>
        body {

            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 60px;

        }


        .container {
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 25%;
            flex: 0 0 calc(25% - 20px);
            box-sizing: border-box;
            padding: 20px;
            display: grid;
            justify-content: center;
            /*text-align: center;*/
            margin: 15px;


        }

        .container img {

            height: 280px;
            width: 280px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-left: 3%;
            margin-right: 20%;

        }

        .container h4,
        .container p {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            margin-top: 10px;

        }
    </style>
</head>

<body>

    <a class="back-link" href="menu_empresa.php">Voltar</a>
    <br><br><br>

    <?php
    session_start();
    include('validar_usuario.php');
    include('conexao.php');

    $mensagem = "";
    $error_mensagem = "";

    $email = $_SESSION['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canil";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id_pets = $_GET['id'];

        $sql = "DELETE FROM pets_empresa WHERE id_pets = $id_pets";
        $result = $conn->query($sql);

        if ($result) {
            echo "Poster deletado com sucesso!";
        } else {
            echo "Erro ao deletar o poster: " . $conn->error;
        }
    }

    $selectUser = "SELECT id FROM cadastro_empresa WHERE email = '$email'";
    $queryUser = mysqli_query($conexao, $selectUser);
    $rowUser = mysqli_fetch_assoc($queryUser);
    $id = $rowUser['id'];

    $imageId = $id;

    $sql = "SELECT id_pets, arquivo, nomepet, especie, porte, sexo, obs FROM pets_empresa WHERE id = $imageId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {


            $id_pets = $row['id_pets'];
            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];
            $especie = $row['especie'];
            $porte = $row['porte'];
            $sexo = $row['sexo'];
            $obs = $row['obs'];


            echo '<div class="container">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<h4>Nome do pet: </h4>';
            echo '<p>' . $nomePet . '</p>';
            echo '<h4>Especie: </h4>';
            echo '<p>' . $especie . '</p>';
            echo '<h4>Porte: </h4>';
            echo '<p>' . $porte . '</p>';
            echo '<h4>Sexo: </h4>';
            echo '<p>' . $sexo . '</p>';
            echo '<h4>Alguma observação? Doença? Deficiência?: </h4>';
            echo '<p>' . $obs . '</p>';
            echo '<br>';
            echo '<a href="?id=' . $id_pets . '" onclick="return confirm(\'Tem certeza que deseja deletar?\')">DELETAR</a>';
            echo '<br>';
            echo '<form method="POST" action="editar_poster_cache_empresa.php">
                        <input type="hidden" name="id_pets" value="' . $id_pets . '">
                        <input type="submit" value="EDITAR">
                    </form>';
            echo '<br>';
            echo '</div>';
        }
    } else {
        echo "Voce não tem posteres inseridos";
    }


    $conn->close();


    ?>

</body>

</html>