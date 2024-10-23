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

        <div class="form-input-material">
            <input type="text" name="usuario" id="username" placeholder=" " maxlength="25" autocomplete="off" class="form-control-material" required />
            <label for="username">Username</label>
        </div>

        <div class="form-input-material">
            <input type="password" name="senha" id="password" placeholder=" " autocomplete="off" class="form-control-material" required />
            <label for="password">Password</label>
        </div>

        <button type="submit" class="btn btn-primary btn-ghost">Login</button>

        <p>Não tem login? <a href="sis/cadastro/funceusu.php">Cadastre-se</a></p>
    </form>
</body>
</html>
