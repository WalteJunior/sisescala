<?php
session_start();

// Conexão com o banco de dados
$con = mysqli_connect("localhost", "root", "", "sisescala");

// Verifique se a conexão foi bem-sucedida
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $nova_senha = mysqli_real_escape_string($con, $_POST['nova_senha']);

    // Atualiza a senha no banco de dados
    $senha_hash = sha1($nova_senha);  // Gera o hash da nova senha
    $query = "UPDATE usuarios SET senha = '$senha_hash' WHERE usuario = '$usuario'";
    
    if (mysqli_query($con, $query)) {
        header('Location: /sisescala/index.php?warn=1'); // Redireciona para a página inicial com código de sucesso
    } else {
        // Exibe erro de SQL e redireciona
        header('Location: /sisescala/index.php?warn=6&error=' . urlencode(mysqli_error($con)));
    }
}

// Feche a conexão
mysqli_close($con);
?>
