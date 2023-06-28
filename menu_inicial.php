<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">


  <title>Dog Venture Pro</title>
  <style>
    
    body {
      background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561037503111218/img_banner_sobre_nos.png");
      width: 100vw;
      height: 100vh;
      display: block;
      justify-content: center;
      align-items: center;
      font-family: 'Arial', sans-serif;
      font-size: 24px;
      font-style: italic;
      color: #333;
      
      

    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      text-align: center;
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
      margin-top: 31px;

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
      margin-top: 50px;
      
    }

    footer {
      margin-top: 50px;
      background-color: #3E9AAB;
      padding: 10px;
      text-align: center;
      color: #fff;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="topbar">
    <div class="logo_dogventure">
      <img src="img/logo_pet.png" alt="Dog Venture Pro Logo">
    </div>

    <ul class="botoes_dogventurepro">
      <li><a href="menu_inicial.php">Home</a></li>
      <li><a href="sobre_nos.php">Quem somos</a></li>
      <li><a href="animais_menu.php">Animais para adoção</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>

  <div class="container">
    <div class="imagem_dogventure">
      <img src="img/banner_inicial_pt.png" alt="Banner inicial">
    </div>

    <div class="caixa_dogventure">
      <?php
        require_once "conexao.php";
        mysqli_close($conexao);
      ?>
    </div>

    <h1>Denuncie maus tratos!</h1>
    <img src="img/cao.png" alt="Imagem de um cão">
    <h2>Faça parte do movimento Dog Venture Pro e lute contra os maus tratos aos animais!</h2>
    <p>Juntos, podemos fazer a diferença e garantir um futuro mais humano para nossos companheiros de quatro patas.</p>
    <p>Se presenciar qualquer ato de crueldade, não hesite em denunciar.</p>
    <p>Entre em contato com o IBAMA no número 0800 061 8080 e com a polícia no 190.</p>
    <p>Vamos unir forças e defender aqueles que não podem falar por si mesmos.</p>
    <p>Seja a voz dos animais e ajude a construir um mundo onde o respeito e a compaixão sejam os alicerces da convivência.</p>
    <p>Junte-se a nós e faça a diferença!</p>
    <p>Nosso e-mail: <a href="mailto:dogventurepro@gmail.com">dogventurepro@gmail.com</a></p>
  </div>

  <footer>
    <p>&copy; 2023 Dog Venture Pro. Todos os direitos reservados.</p>
  </footer>
</body>

</html>