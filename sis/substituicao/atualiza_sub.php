<?php
    $id = $_GET["id"];
    $solicitante                = $_POST["solicitante"];
    $motivo                     = $_POST["motivo"];
    $data_solic                 = $_POST["data_solic"];
    $substituto                 = $_POST["substituto"];
    $data_subs                  = $_POST["data_subs"];
    $aprovado                   = $_POST["ativo_sub"];
    


    // Atualiza no banco de dados
    $sql = "UPDATE substituicao SET solicitante='$solicitante', motivo='$motivo', data_solic='$data_solic', substituto='$substituto', data_subs='$data_subs', ativo_sub='$aprovado' WHERE id=$id;";
    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        header('Location: \sisescala/home.php?page=lista_sub&msg=2');
    } else {
        header('Location: \sisescala/home.php?page=lista_sub&msg=4');
    }
    mysqli_close($con);
?>
