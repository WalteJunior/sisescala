<?php
    $id                 = $_POST["id"];
    $motivo             = $_POST["motivo"];
    $data               = $_POST["data"];

    $fdg_dt_nasc = date('Y-m-d',strtotime($data)); 

    $sql = "update substituicao set ";
    $sql .= "motivo='".$motivo."',";
    $sql .= "data='".$data."' ";
    $sql .= "where id = '".$id."';";

    $resultado = mysqli_query($con, $sql);

    if($resultado){
        header('Location: \sisescala/index.php?page=lista_sub&msg=2');
        mysqli_close($con);
    }else{
        header('Location: \sisescala/index.php?page=lista_sub&msg=4');
        mysqli_close($con);
    }
?>
