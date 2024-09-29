<?php

    $motivo             = $_POST["motivo"];
    $data               = $_POST["data"];

    $fdt_nasc 	= implode("-", array_reverse(explode("/", $data)));

    $sql = "insert into substituicao values ";
    $sql .= "('0','$motivo','$data');";

    $resultado = mysqli_query($con, $sql);

    if($resultado){
        header('Location: \sisescala/index.php?page=lista_sub&msg=1');
        mysqli_close($con);
    }else{
        header('Location: \sisescala/index.php?page=lista_sub&msg=4');
        mysqli_close($con);
    }
?>