<?php
session_start();

// Verifica se o usuário foi passado na URL
if (!isset($_GET['usuario'])) {
    echo "Usuário não especificado.";
    exit();
}

$usuario = htmlspecialchars($_GET['usuario']);
?>

<head>
    <link rel="stylesheet" href="../../css/login.css">
    <title>Nova senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        div.icon{
            top:48%;
            right: 35vw;
        }
    </style>
</head>
<form action="atualiza_senha.php" method="post" class="login-form">
    <h1 style="color: black;">Atualizar Senha para: <?php echo $usuario; ?></h1>

    <div class="form-input-material">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>" />
        <input type="password" name="nova_senha" placeholder="Nova Senha" id="password" class="form-control-material" required />
    </div>
    <div class="icon" id="eye" onclick="show()"></div>
    <button type="submit" class="btn btn-primary btn-ghost">Atualizar Senha</button>

</form>
<script src="../../js/login.js"></script>
