<!DOCTYPE html>
<html>
<head>
    <title>Lista de canil disponível</title>
    <style>
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
    <h1>Lista de canil disponível</h1>

    <a href="menu_usuario.php">Voltar</a>
    <br><br><br>

    <div class="container">
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

        $sql = "SELECT id, nome, cnpj, telefone, email, cidade, estado, cep FROM cadastro_empresa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $nome = $row['nome'];
                $cnpj = $row['cnpj'];
                $telefone = $row['telefone'];
                $email = $row['email'];
                $cidade = $row['cidade'];
                $estado = $row['estado'];
                $cep = $row['cep'];

                echo '
                <div class="company-card">
                    <h3>Nome da empresa: ' . $nome . '</h3>
                    <p>CNPJ: ' . $cnpj . '</p>
                    <p>Telefone: ' . $telefone . '</p>
                    <p>E-mail: ' . $email . '</p>
                    <p>Cidade: ' . $cidade . '</p>
                    <p>Estado: ' . $estado . '</p>
                    <p>CEP: ' . $cep . '</p>
                    <form method="POST" action="dados_encaminhar_pet2.php" class="select-form">
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="submit" value="SELECIONAR">
                    </form>
                </div>
                ';
            }
        } else {
            echo "<p>Nenhum canil disponível.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
