<!DOCTYPE html>
<html>
<head>
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
      background-color: #3E9AAB;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
      padding: 50px;
    }

    h2 {
      color: #333;
      font-size: 24px;
      margin-top: 0;
      text-align: center;
    }

    label {
      color: #333;
      display: block;
      font-weight: bold;
      margin-top: 10px;
    }

    input[type="text"] {
      width: 95%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-top: 5px;
      
    }

    input[type="submit"] {
      background-color:  #FFD84D;
      color: black;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    input[type="submit"][name="voltar"] {
      background-color:  #FFD84D;
    }

    input[type="submit"][name="voltar"]:hover {
      background-color:  #45a049;
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
  <?php
  session_start();
  include('validar_usuario.php');
  include('conexao.php');

  $mensagem = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id_pets = $_POST['id_pets'];
      $nomepet = $_POST['nomepet'];
      $especie = $_POST['especie'];
      $porte = $_POST['porte'];
      $sexo = $_POST['sexo'];
      $obs = $_POST['obs'];

      $update_pet = "UPDATE pets_empresa SET nomepet = '$nomepet', especie = '$especie', porte = '$porte', sexo = '$sexo', obs = '$obs' WHERE id_pets = $id_pets";
      mysqli_query($conexao, $update_pet);

      $mensagem = 'Dados atualizados com sucesso!';
  }

  if (isset($_POST['voltar'])) {
      $truncate_caches_pet = "TRUNCATE TABLE caches_pet";
      mysqli_query($conexao, $truncate_caches_pet);

      header('Location: gerenciador_posteres_empresa.php');
      exit();
  }

  $ordem_sql = "SELECT ordem FROM caches_pet_emp ORDER BY ordem DESC LIMIT 1";
  $result = mysqli_query($conexao, $ordem_sql);
  $row = mysqli_fetch_assoc($result);
  $ordem = $row['ordem'];

  $id_pets_sql = "SELECT id_pets FROM caches_pet_emp WHERE ordem = $ordem";
  $result = mysqli_query($conexao, $id_pets_sql);
  $row = mysqli_fetch_assoc($result);
  $id_pets = $row['id_pets'];

  $select = "SELECT nomepet, especie, porte, sexo, obs FROM pets_empresa WHERE id_pets = $id_pets";
  $query = mysqli_query($conexao, $select);
  $dados = mysqli_fetch_assoc($query);
  ?>

  
    <div class="container">
      <h2>Editar Poster</h2>

      <?php if (!empty($mensagem)) : ?>
        <div class="message">
          <p><?php echo $mensagem; ?></p>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <input type="hidden" name="id_pets" value="<?php echo $id_pets; ?>">

        <label for="nomepet">Nome:</label>
        <input type="text" id="nomepet" name="nomepet" value="<?php echo isset($dados['nomepet']) ? $dados['nomepet'] : ''; ?>">

        <label for="especie">Espécie:</label>
        <input type="text" id="especie" name="especie" value="<?php echo isset($dados['especie']) ? $dados['especie'] : ''; ?>">

        <label for="porte">Porte:</label>
        <input type="text" id="porte" name="porte" value="<?php echo isset($dados['porte']) ? $dados['porte'] : ''; ?>">

        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo isset($dados['sexo']) ? $dados['sexo'] : ''; ?>">

        <label for="obs">Observações:</label>
        <input type="text" id="obs" name="obs" value="<?php echo isset($dados['obs']) ? $dados['obs'] : ''; ?>">

        <input type="submit" value="Salvar">
        <input type="submit" name="voltar" value="Voltar">
      </form>
    </div>

</body>
</html>
