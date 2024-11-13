<div> <?php include "sis/cadastro/mensagens.php"; ?> </div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="validacao.php" method="post" class="login-form">
        <img src="./assets/logo.jpeg" alt="Logo da Empresa">

        <div class="row">
            <div class="form-group col-md-12 d-flex align-items-center justify-content-center">
                <div class="form-input-material">
                    <input type="text" name="usuario" id="username" placeholder=" " maxlength="25" autocomplete="off" class="form-control-material" required />
                    <label for="username">Username</label>
                </div>
            </div>

            <div class="form-group col-md-12 d-flex align-items-center justify-content-center">
                <div class="form-input-material position-relative">
                    <input type="password" name="senha" id="password" placeholder=" " autocomplete="off" class="form-control-material" required style="padding-right: 35px;" />
                    <label for="password">Password</label>
                    <div class="icon position-absolute" id="eye" onclick="show()" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></div>
                </div>
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary btn-ghost">Login</button><br>

        <p>Esqueceu a senha?<a href="sis/senha/novasenha.php"> Redefinir senha</a></p>

        <p>Não tem login? <a href="sis/cadastro/funceusu.php">Cadastre-se</a></p>
    </form>
    <script src="js/login.js"></script>
</body>
</html>
