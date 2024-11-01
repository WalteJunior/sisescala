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

    // Verifica se o usuário existe no banco de dados
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_num_rows($resultado) > 0) {
        // Usuário existe, redireciona para a página de atualização de senha
        header("Location: redefinir.php?usuario=" . urlencode($usuario));
        exit();
    } else {
        echo "<p>Usuário não encontrado. Por favor, verifique o nome de usuário.</p>";
    }
}

// Feche a conexão
mysqli_close($con);
?>
