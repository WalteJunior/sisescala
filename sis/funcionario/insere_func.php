<?php

$id_func                    =$_POST['id_func'];
$nome_func                  = $_POST["nome_func"];
$telefone_func              = $_POST["telefone_func"];
$email_func                 = $_POST["email_func"];
$sexo_func                  = $_POST["sexo_func"];
$cargo_func                 = $_POST["cargo_func"];
$id_end                     = $_POST["id_end"];
$cep_end                    = $_POST["cep_end"];
$rua_end                    = $_POST["rua_end"];
$compl_end                  = $_POST["compl_end"];
$bairro_end                 = $_POST["bairro_end"];
$cidade_end                 = $_POST["cidade_end"];
$estado_end                 = $_POST["estado_end"];


    $sql = "INSERT INTO funcionario (nome_func, telefone_func, email_func, sexo_func, cargo_func) 
            VALUES ('$nome_func', '$telefone_func', '$email_func', '$sexo_func', '$cargo_func')";
    $resul_func = mysqli_query($con, $sql);


    if($resul_func){
        // Aq Pegq o ID do funcionário que acabou de inserir
    $id_func = mysqli_insert_id($con);

        $sql_end = "INSERT INTO endereco (id_func, cep_end, rua_end, compl_end, bairro_end, cidade_end, estado_end) VALUES ('$id_func', '$cep_end', '$rua_end', '$compl_end', '$bairro_end', '$cidade_end', '$estado_end')";

            $resul_end = mysqli_query($con, $sql_end);
            if ($resul_end) {
                // Se funcionário e endereco cadastrar
                header('Location: /siscrud/index.php?page=lista_func&msg=1'); //mensagem de inserido com sucesso
            } else {
                // Se der erro no endereco
                header('Location: /siscrud/index.php?page=lista_func&msg=4'); // mensagem de erro
            }
        
        } else {
            // Se der erro no funcionario
            header('Location: /siscrud/index.php?page=lista_func&msg=4');
        }
        
        // Fechando a conexao 
        mysqli_close($con);





    // $sql = "insert into funcionario values ";
    // $sql .= "('0','$nome_func','$telefone_func','$sexo_func', );";
    
    // '0', '$cep_end','$rua_end','$compl_end','$bairro_end','$cidade_end','$estado_end'

?>


    

    