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
            /*text-align: center;*/
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

        
        .card h4, .card p {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            margin-top: 10px;

        }


        .back-button {
            position: absolute;
            top: 0;
            left: 0;
            
        }
        .back-link {
            font-size: 20px;
        }

    </style>
</head>
<body>
    <div class="back-button">
        <a class="back-link" href="menu_empresa.php"><<</a>
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

        
        $sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
                FROM pets AS p
                INNER JOIN cadastro_usuario AS u ON p.id = u.id";
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {


                $imageData = $row['arquivo'];
                $nomePet = $row['nomepet'];
                $especie = $row['especie'];
                $porte = $row['porte'];
                $sexo = $row['sexo'];
                $obs = $row['obs'];
                $email =  $row['email'];            
                $telefone = $row['telefone'];
                
            
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';          
                echo '<h4>Nome do pet: </h4>';
                echo '<p>' . $nomePet . '</p>';
                echo '<h4>Espécie: </h4>';
                echo '<p>'. $especie . '</p>';
                echo '<h4>Porte: </h4>';
                echo '<p>' . $porte .'</p>';
                echo '<h4>Sexo: </h4>';
                echo '<p>'. $sexo .'</p>';
                echo '<h4>Alguma observação? Doença? Deficiência?: </h4>';
                echo '<p>'. $obs . '</p>';
                echo '<h4>Telefone para entrar em contato: </h4>';
                echo '<p>'. $telefone . '</p>';
                echo '<br>';
                echo '<a href="mailto:'. $email .'?subject=Quero adotar seu pet.& '.$email.'"> Entrar em contato por email</a>';
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
                $especie = $row['especie'];
                $porte = $row['porte'];
                $sexo = $row['sexo'];
                $obs = $row['obs'];
                $email =  $row['email'];            
                $telefone = $row['telefone'];
                
            
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';          
                echo '<h4>Nome do pet: </h4>';
                echo '<p>' . $nomePet . '</p>';
                echo '<h4>Espécie: </h4>';
                echo '<p>'. $especie . '</p>';
                echo '<h4>Porte: </h4>';
                echo '<p>' . $porte .'</p>';
                echo '<h4>Sexo: </h4>';
                echo '<p>'. $sexo .'</p>';
                echo '<h4>Alguma observação? Doença? Deficiência?: </h4>';
                echo '<p>'. $obs . '</p>';
                echo '<h4>Telefone para entrar em contato: </h4>';
                echo '<p>'. $telefone . '</p>';
                echo '<br>';
                echo '<a href="mailto:'. $email .'?subject=Quero adotar seu pet.& '.$email.'"> Entrar em contato por email</a>';
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