<?php
session_start();
include('validar_usuario.php');
include('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561596113113169/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            
            background-repeat: no-repeat;
            background-position: center;
            font-size: 18px;
            letter-spacing: 0.5px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 60px;
            
        }

        .topbar {
            background-color: #333;
            color: #fff;
            width: 100%;
            padding: 5px;
            position: fixed;
            top: 0;
            left: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
        }

        .topbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .topbar li {
            display: inline-block;
        }

        .topbar li a {
            display: block;
            margin-right: 15px;
            color: #fff;
            text-decoration: none;
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        .topbar li a:hover {
            color: #ffd700;
        }

        .topbar li .emoji {
            margin-right: 20px;
            font-size: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .topbar li a:hover .emoji {
            transform: scale(1.2);
        }

        .topbar li a:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 90%;
            background-color: #000;
            opacity: 0.4;
            z-index: -1;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 25%;
            flex: 0 0 calc(25% - 20px);
            box-sizing: border-box;
            padding: 20px;
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 15px;
        }

        .card img {
            height: 280px;
            width: 280px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-left: 3%;
            margin-right: 20%;
        }

        .card h4,
        .card p {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            margin-top: 10px;
        }
    </style>
	<script>
		function setActiveTab(tabId) {
			var tabs = document.getElementsByClassName("tab");
			for (var i = 0; i < tabs.length; i++) {
				tabs[i].classList.remove("active");
			}
			document.getElementById(tabId).classList.add("active");
		}
	</script>
</head>
<body>
	<div class="topbar">
		<ul>
		<li><a href="limpar_cache_gerenciador_empresa.php?truncate=1"><span class="emoji">&#128218;</span>Gerenciador de posteres</a></li>
        <li class="tab" id="inserir"><a href="inserir_poster_empresa.php" onclick="setActiveTab('inserir')"><span class="emoji">&#128073;</span>Inserir poster</a></li>
		<li class="tab" id="ver"><a href="ver_formularios.php" onclick="setActiveTab('ver')"><span class="emoji">📁</span>Formularios recebidos</a></li>
		</ul>
	<ul>
		<div class="right-buttons">
                <ul> 
                    <li><a href="editar_perfil_empresa.php"><span class="emoji">&#128100;</span>Editar perfil</a></li>
                    <li><a href="sair.php"><span class="emoji">&#128682;</span>Sair</a></li>
                </ul>
            </div>
        </div>
        <div class="background-image"></div>
    </div>
    
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canil";

    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    

    $sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
            FROM pets AS p
            INNER JOIN cadastro_usuario AS u ON p.id = u.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];
            

            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<p>Nome do pet: ' . $nomePet . '</p>';
            echo '<a href="adotar_pet_empresa.php">Ver mais informações</a>';
            echo '</div>'; 
            
        }
    } else {
        echo "Nenhum pet encontrado.";
    }

    $sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
            FROM pets_empresa AS p
            INNER JOIN cadastro_empresa AS u ON p.id = u.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];
            

            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<p>Nome do pet: ' . $nomePet . '</p>';
            echo '<a href="adotar_pet_empresa.php">Ver mais informações</a>';
            echo '</div>';
            
            
            
        }
    } else {
        echo "Nenhum pet encontrado.";
    }

    $conn->close();
    ?>
</body>
</html>


