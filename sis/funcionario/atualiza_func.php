<?php
    $id_func                         = $_POST["id_func"];
    $nome_func                       = $_POST["nome_func"];
    $cargo_func                      = $_POST["cargo_func"];
    $email_func                      = $_POST["email_func"];
    $telefone_func                   = $_POST["telefone_func"];
    $sexo_func                       = $_POST["sexo_func"];
    $id_end                          = $_POST["id_end"];
    $cep_end                         = $_POST["cep_end"];
    $rua_end                         = $_POST["rua_end"];
    $compl_end                       = $_POST["compl_end"];
    $bairro_end                      = $_POST["bairro_end"];
    $cidade_end                      = $_POST["cidade_end"];
    $estado_end                      = $_POST["estado_end"];


    $sql = "update funcionario set ";
    $sql .= "nome_func='".$nome_func."', cargo_func='".$cargo_func."', email_func='".$email_func."', telefone_func='".$telefone_func."', sexo_func='".$sexo_func."'";
    $sql .= "where id_func = '".$id_func."';";
    

    $sql2 = "update endereco set ";
    $sql2 .= "cep_end='".$cep_end."', rua_end='".$rua_end."', compl_end='".$compl_end."', bairro_end='".$bairro_end."', cidade_end='".$cidade_end."', estado_end='".$estado_end."'";
    $sql2 .= "where id_end = '".$id_end."';";

    $resul_func = mysqli_query($con, $sql);
    $resul_end = mysqli_query($con, $sql2);

    if($resul_func && $resul_end){
        header('Location: \siscrud/index.php?page=lista_func&msg=2');
        mysqli_close($con);
    }else{
        header('Location: \siscrud/index.php?page=lista_func&msg=4');
        mysqli_close($con);
    }


?>
