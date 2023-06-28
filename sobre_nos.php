<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <style>
        body {
            background-image: url("https://cdn.discordapp.com/attachments/1120560866505527347/1120561037503111218/img_banner_sobre_nos.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #FFD84D;
            font-family: Arial, sans-serif;
            width: 100vw;
            height: 100vh;
            display: block;
            align-items: center;
            justify-content: start;
            height: 100vh;

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


        .topbar a {
            font-size: 30px;
        }


        .conteudo_sobre_nos {
            width: 100vw;
            height: 100vh;
            display: block;
            font-size: 20px;
            font-style: italic;

        }

        footer {
            background-color: #3E9AAB;
            padding: 10px;
            color: #fff;
            font-size: 14px;
            position: relative;
            text-align: center;
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

    <div class="conteudo_sobre_nos">
        <h1 id="nome_sobre">Sobre Nós:</h1>
        <p>A Dog Venture Pro é uma plataforma dedicada à adoção e recepção de pets para pessoas físicas e jurídicas.</p>
        <p>Nossa missão é fornecer um sistema profissional de cadastro de animais domésticos e de cativeiro,</p>
        <p>permitindo que o usuário possa adotar ou colocar algum animalzinho para adoção. Além disso,</p>
        <p>nosso serviço permite mapear as raças, quantidades por região, sexo e idade,</p>
        <p>oferecendo um panorama completo dos animais que estão disponíveis para adoção em nosso meio.</p>
        <p>Estamos comprometidos em facilitar o processo de adoção de pets,</p>
        <p>conectando aqueles que desejam adotar um animal de estimação</p>
        <p>disponíveis para adoção em abrigos e lares temporários.</p>
        <p>Através de nossa plataforma, você poderá buscar e filtrar animais</p>
        <p>com base em critérios como raça, idade, localização e outros.</p>
        <p>Também fornecemos informações detalhadas sobre cada animal,</p>
        <p>incluindo fotos, histórico médico e comportamental.</p>
        <p>Se você está procurando um novo membro para sua família,</p>
        <p>ou está interessado em fornecer um lar temporário para um animal necessitado,</p>
        <p>a Dog Venture Pro é o lugar certo para você.</p>
        <p>Junte-se a nós nessa jornada de amor e compaixão pelos animais.</p>

        <div class="dados_sobre_nos">
            <h2 id="nome_contato">Entre em contato conosco:</h2>
            <ul>
                <li>
                    Atendimento Dog Venture Pro: <a href="mailto:dogventurepro@gmail.com">dogventurepro@gmail.com</a>
                </li>
            </ul>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 Dog Venture Pro. Todos os direitos reservados.</p>
    </footer>
</body>

</html>