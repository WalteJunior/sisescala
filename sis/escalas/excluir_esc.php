<?php
$id = (int) $_GET['id_func'];

// Executa a exclusão da escala do funcionário com o `id_func` passado
$sql = "DELETE FROM escala WHERE id_func = '$id';"; 
$resultado = mysqli_query($con, $sql);

if ($resultado) {
    // Atualiza o turno do funcionário para NULL
    $sql_turno = "UPDATE funcionario SET turno = NULL WHERE id_func = '$id';";
    $resultado_turno = mysqli_query($con, $sql_turno);

    // Verifica se ambos, exclusão de escala e atualização do turno, foram bem-sucedidos
    if ($resultado_turno) {
        // Redireciona de volta para a página de visualização da escala com mensagem de sucesso
        header('Location: /sisescala/home.php?page=view_escala&id_func=' . $id . '&msg=3');
    } else {
        // Caso a atualização do turno falhe, redireciona com mensagem de erro
        header('Location: /sisescala/home.php?page=view_escala&id_func=' . $id . '&msg=4');
    }
} else {
    // Caso a exclusão da escala falhe, redireciona com mensagem de erro
    header('Location: /sisescala/home.php?page=view_escala&id_func=' . $id . '&msg=4');
}

// Fecha a conexão
mysqli_close($con);
?>
