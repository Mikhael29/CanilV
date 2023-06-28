<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-wrap: wrap;
            padding-top: 60px;
          
        }

        .card {
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 25%;
            flex: 0 0 calc(25% - 20px);
            box-sizing: border-box;
            padding: 20px;
            display: grid;
            justify-content: center;
            margin: 15px;

        }

        .card img {

            height: 280px;
            width: 280px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-left: 8%;
            margin-right: 20%;

        }


        .card h4,
        .card p {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            margin-top: 10px;

        }

        .back-link {
            font-size: 20px;
        }

        .topbar {
            position: fixed;
            background-color: #3E9AAB;
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
            right: 0;
            max-width: 100%;
            margin: 0;
            height: 80px;

        }

        .topbar img {
            align-self: flex-start;
            max-width: 200px;
            max-height: 200px;
            margin-top: 30px;

        }

        .topbar ul {
            margin: 0;
            padding: 0;
            margin-right: 40px;
            flex-grow: 1;
            display: flex;
            justify-content: center;

        }

        .topbar ul li {
            margin-right: 10px;
            display: inline;
            justify-content: center;

        }

        .topbar ul li a {
            text-decoration: none;
            padding: 5px 10px;
            font-style: italic;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin-right: 20px;

        }

        .topbar a:hover {
            color: #F9B013;
            transition: color 0.5s;
        }

        .topbar a {
            font-size: 30px;
        }

        .imagem_dogventure img {
            margin-top: 70px;

        }

        
    </style>
</head>

<body>
    <div class="topbar">
        <div class="logo_dogventure">
            <img src="img\logo_pet.png">
        </div>

        <ul class="botoes_dogventurepro">
            <li> <a href="menu_inicial.php">Home</a></li>
            <li> <a href="sobre_nos.php">Quem somos</a></li>
            <li> <a href="animais_menu.php">Animais para adoção</a></li>
            <li> <a href="login.php">Login</a></li>
        </ul>
    </div>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "canil";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT arquivo, nomepet FROM pets";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];

            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<h4>Nome do pet: </h4>';
            echo '<p>' . $nomePet . '</p>';
            echo '<a href="login.php">Ver mais informações</a>';
            echo '</div>';
        }
    } else {
        echo "Nenhum pet encontrado.";
    }

    $sql = "SELECT arquivo, nomepet FROM pets_empresa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];

            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<h4>Nome do pet: </h4>';
            echo '<p>' . $nomePet . '</p>';
            echo '<a href="login.php">Ver mais informações</a>';
            echo '</div>';
        }
    } else {
        echo "Nenhum pet encontrado.";
    }


    $conn->close();
    ?>

</body>
<div class="card-container">

</div>