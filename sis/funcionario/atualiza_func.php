﻿<?php
$id_func = $_POST["id_func"];
$nome_func = $_POST["nome_func"];
$cargo_func = $_POST["cargo_func"];
$email_func = $_POST["email_func"];
$telefone_func = $_POST["telefone_func"];

// Recupera o valor atual de sexo_func se ele não for enviado no formulário
if (!isset($_POST["sexo_func"])) {
    $query = "SELECT sexo_func FROM funcionario WHERE id_func = '".$id_func."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $sexo_func = $row["sexo_func"];
} else {
    $sexo_func = $_POST["sexo_func"];
}

// Dados do endereço
$id_end = $_POST["id_end"];
$cep_end = $_POST["cep_end"];
$rua_end = $_POST["rua_end"];
$compl_end = $_POST["compl_end"];
$bairro_end = $_POST["bairro_end"];
$cidade_end = $_POST["cidade_end"];
$estado_end = $_POST["estado_end"];

// Consulta SQL para atualizar os dados do funcionário
$sql = "UPDATE funcionario SET 
            nome_func='".$nome_func."', 
            cargo_func='".$cargo_func."',  
            email_func='".$email_func."', 
            telefone_func='".$telefone_func."', 
            sexo_func='".$sexo_func."' 
        WHERE id_func = '".$id_func."'";

// Consulta SQL para atualizar os dados do endereço
$sql2 = "UPDATE endereco SET 
            cep_end='".$cep_end."', 
            rua_end='".$rua_end."', 
            compl_end='".$compl_end."', 
            bairro_end='".$bairro_end."', 
            cidade_end='".$cidade_end."', 
            estado_end='".$estado_end."' 
        WHERE id_end = '".$id_end."'";

// Executa as consultas
$resul_func = mysqli_query($con, $sql);
$resul_end = mysqli_query($con, $sql2);

// Verifica se ambas as consultas foram bem-sucedidas
if ($resul_func && $resul_end) {
    header('Location: \sisescala/home.php?page=lista_func&msg=2');
    mysqli_close($con);
} else {
    header('Location: \sisescala/home.php?page=lista_func&msg=4');
    mysqli_close($con);
}
?>
