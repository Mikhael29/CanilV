<!DOCTYPE html>
<html>


<head>
    <title>Menu</title>
    <link rel="stylesheet" href="css/style1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form_login').submit(function(e) {
                e.preventDefault();
                var email = $('#email').val();
                var senha = $('#senha').val();

                $.ajax({
                    type: 'POST',
                    url: 'autenticar.php',
                    data: {
                        email: email,
                        senha: senha
                    },
                    success: function(response) {
                        if (response === 'success_empresa') {
                            window.location.href = 'menu_empresa.php';
                        } else if (response === 'success_usuario') {
                            window.location.href = 'menu_usuario.php';
                        } else {
                            $('#mensagem').text('Usuário ou senha inválidos');
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
   
    <div class="background-image"></div>
    <div class="container">
        <div class="form-container">
            <div class="center"></div>
            <h1>Efetue seu login ou faça seu cadastro:</h1>
            <form id="form_login" method="POST">
                <div class="form-field">
                    <input type="text" name="email" id="email" required>
                    <label for="email">Digite seu e-mail</label>
                </div>
                <div class="form-field">
                    <input type="password" name="senha" id="senha" required>
                    <label for="senha">Digite sua senha</label>
                </div>
                <div class="form-field">
                    <input type="submit" name="enviar" value="Entrar">
                </div>
                <div class="link">
                    <a href="alterarSenha.php" class="btn-alterar-senha">Esqueci a senha</a>
                    <a href="cadastrar.php" class="btn-cadastrar">Cadastrar</a>
                </div>
            </form>
            <div id="mensagem" class="message"></div>
        </div>
    </div>

</body>

</html>