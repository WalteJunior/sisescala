<head>
    <link rel="stylesheet" href="\sisescala\css\login.css">
    <title>Recuperar Senha</title>
</head>
<form action="verificar.php" method="post" class="login-form">
    <h1>Recuperação de Senha</h1>

    <div class="form-input-material">
        <input type="text" name="usuario" id="username" placeholder=" " maxlength="25" autocomplete="off" class="form-control-material" required />
        <label for="username">Informe Username</label>
    </div>

    <button type="submit" class="btn btn-primary btn-ghost">Verificar Usuario</button><br>
    <a href="../../logout.php"><button type="button" class="btn btn-secondary btn-ghost">Voltar</button></a>

</form>