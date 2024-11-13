<head>
    <link rel="stylesheet" href="../../css/login.css">
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1{
            font-size: 22px;
            margin-bottom: 5px;
        }
    </style>
</head>
<form action="verificar.php" method="post" class="login-form">
    <h1 style="color: black;">Recuperação de Senha</h1>

    <div class="form-input-material">
        <input type="text" name="usuario" id="username" placeholder=" " maxlength="25" autocomplete="off" class="form-control-material" required />
        <label for="username">Informe Username</label>
    </div>

    <button type="submit" class="btn btn-primary btn-ghost" style="margin-bottom: 5px;">Verificar Usuario</button>
    <a href="../../logout.php"><button type="button" class="btn btn-secondary btn-ghost">Voltar</button></a>

</form>