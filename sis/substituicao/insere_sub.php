<?php

    $solicitante                = $_POST["solicitante"];
    $motivo                     = $_POST["motivo"];
    $data_solic                 = $_POST["data_solic"];
    $substituto                 = $_POST["substituto"];
    $data_subs                  = $_POST["data_subs"];
    $aprovado                   = $_POST["ativo_sub"];

    $brdt_solic 	= implode("-", array_reverse(explode("/", $data_solic)));

    $brdt_subs 	= implode("-", array_reverse(explode("/", $data_subs)));

    $sql = "INSERT INTO substituicao (solicitante, motivo, data_solic, substituto, data_subs, ativo_sub) 
        VALUES ('$solicitante', '$motivo', '$brdt_solic', '$substituto', '$brdt_subs', '$aprovado');";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        header('Location: \sisescala/home.php?page=lista_sub&msg=1');
        mysqli_close($con);
    }else{
        header('Location: \sisescala/home.php?page=lista_sub&msg=4');
        mysqli_close($con);
    }
?>