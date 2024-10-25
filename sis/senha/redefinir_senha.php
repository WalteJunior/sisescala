<head>
    <link rel="stylesheet" href="\sisescala\css\login.css">
    <title>Nova senha</title>
</head>
<form action="salvar_nova_senha.php" method="post" class="login-form">

<input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <label for="senha">Nova senha:</label>
    <input type="password" id="senha" name="senha" required>
    <button type="submit">Salvar nova senha</button>

</form>