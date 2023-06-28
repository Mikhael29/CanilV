<?php
session_start();
include('validar_usuario.php');
include('conexao.php');


  $mensagem = "";
  $error_mensagem = "";
  
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
  $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
  $novo_email = mysqli_real_escape_string($conexao, $_POST['novo_email']);
  $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
  $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
  $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
  $senha_atual = mysqli_real_escape_string($conexao, $_POST['senha_atual']);
  $nova_senha = mysqli_real_escape_string($conexao, $_POST['nova_senha']);
  $confirmar_senha = mysqli_real_escape_string($conexao, $_POST['confirmar_senha']);
  $email = $_SESSION['email'];

  $select_senha = "SELECT senha FROM login WHERE email = '$email'";
  $query_senha = mysqli_query($conexao, $select_senha);

  if ($query_senha) {
    $dados_senha = mysqli_fetch_assoc($query_senha);
    $senha_banco = $dados_senha['senha'];

    if ($senha_atual === $senha_banco) {
      if (!empty($nova_senha) && !empty($confirmar_senha)) {
        if ($nova_senha === $confirmar_senha) {
          $update_senha = "UPDATE login SET senha = '$nova_senha' WHERE email = '$email'";
          mysqli_query($conexao, $update_senha);

          $mensagem = "Senha atualizada com sucesso";
        } else {
          $error_mensagem = "A nova senha e a senha de confirmação não coincidem";
        }
      }

      $update_usuario = "UPDATE cadastro_empresa SET nome = '$nome', cnpj = '$cnpj', telefone = '$telefone', cidade = '$cidade', estado = '$estado', cep = '$cep', email = '$novo_email' WHERE email = '$email'";
      mysqli_query($conexao, $update_usuario);

      $update_login = "UPDATE login SET email = '$novo_email' WHERE email = '$email'";
      mysqli_query($conexao, $update_login);
      $_SESSION['email'] = $novo_email;

      $mensagem = "Dados atualizados com sucesso";
    } else {
      $error_mensagem = "Senha atual incorreta";
    }
  } else {
    $error_mensagem = "Erro ao consultar a senha no banco de dados";
  }
}

$email = $_SESSION['email'];
$select = "SELECT nome, cnpj, telefone, email, cidade, estado, cep FROM cadastro_empresa WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
if ($query) {
  $dados = mysqli_fetch_assoc($query);
} else {
  $dados = array();
}
?>
  
  <!DOCTYPE html>
  <html>
  <head>
    <title>Editar Perfil</title>
  
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
        width: 200%;
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
      input[type="file"],
      input[type="password"] {
        width: 100%;
        padding: 8px;
        border: none;
        border-radius: 4px;
        margin-bottom: 10px;
      }

      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 45%;
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
      .error-message {
        background-color: #ff3333;
        font-size: 15px;
        font-family: Arial, sans-serif;
        border-radius: 4px;
        padding: 10px;
        margin-top: 20px;
        text-align: center;
        
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
      <h2>Editar Perfil</h2>
  
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
      
      <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">
  
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" value="<?php echo isset($dados['cnpj']) ? $dados['cnpj'] : ''; ?>">
  
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : ''; ?>">
  
        <label for="novo_email">Email:</label>
        <input type="text" id="novo_email" name="novo_email" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>">

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo isset($dados['cidade']) ? $dados['cidade'] : ''; ?>">

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo isset($dados['estado']) ? $dados['estado'] : ''; ?>">

        <label for="cep">Cep:</label>
        <input type="text" id="cep" name="cep" value="<?php echo isset($dados['cep']) ? $dados['cep'] : ''; ?>">
  
        <label for="senha_atual">Digite sua senha:</label>
        <input type="password" id="senha_atual" name="senha_atual">
  
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha">
  
        <label for="confirmar_senha">Confirmar Nova Senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha">
  
        <input type="submit" value="Salvar">
  
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