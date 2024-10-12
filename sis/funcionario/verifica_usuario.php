<?php
    // Conexão com o banco de dados
    $con = mysqli_connect('localhost', 'root', '', 'sisescala');

    if (!$con) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Recebe o nome de usuário via POST
    $usuario = $_POST['usuario'];

    // Verifica se o usuário já existe
    $query = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 'exists'; // O usuário já existe
    } else {
        echo 'not_exists'; // O usuário não existe
    }

    mysqli_close($con);
?>
