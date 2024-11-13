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
        h1{
            font-size: 22px;
            margin-bottom: 5px;
        }
        button{
            margin-bottom: 2px;
        }
    </style>
</head>
<form action="atualiza_senha.php" method="post" class="login-form">
    <h1 style="color: black;">Atualizar Senha para: <?php echo $usuario; ?></h1>

    <div class="form-input-material">
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>" />
        <input type="password" name="nova_senha" placeholder="Nova Senha" id="password" class="form-control-material" required style="padding-right: 35px;" />
        <div class="icon" id="eye" onclick="show()"></div>
    </div>
    <button type="submit" class="btn btn-primary btn-ghost">Atualizar Senha</button>
    <a href="../../index.php" class="btn btn-danger">Cancelar</a>

</form>
<script src="../../js/login.js"></script>
