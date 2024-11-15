<?php
$id           = $_POST["id"];
$nome         = $_POST["nome"];
$usuario      = $_POST["usuario"];
$email        = $_POST["email"];
$id_func       = $_POST['id_func'];
$telefone     = $_POST["telefone_func"];
$id_end       = $_POST['id_end'];
$cep_end      = $_POST['cep_end'];
$rua_end      = $_POST['rua_end'];
$num_end      = $_POST['num_end'];
$compl_end    = $_POST['compl_end'];
$bairro_end   = $_POST['bairro_end'];
$cidade_end   = $_POST['cidade_end'];
$estado_end   = $_POST['estado_end'];

// Consulta o nível atual do usuário (mantém o nível, embora isso não seja usado no restante do código)
$sql_nivel = "SELECT nivel FROM usuarios WHERE id = '".$id."'";
$result_nivel = mysqli_query($con, $sql_nivel);
$row_nivel = mysqli_fetch_assoc($result_nivel);
$nivel = $row_nivel['nivel'];

// Atualiza os campos editáveis do usuário
$sql_usuario = "UPDATE usuarios SET 
    nome='".$nome."', 
    usuario='".$usuario."', 
    email='".$email."', 
    dt_cadastro=now() 
    WHERE id = '".$id."';";
$resultado_usuario = mysqli_query($con, $sql_usuario);

// Atualiza os campos editáveis do usuário
$sql_func = "UPDATE funcionario SET 
    nome_func = '".$nome."',
    telefone_func = '".$telefone."',
    email_func = '".$email."'
    WHERE id_func = '".$id_func."';";
$resultado_func = mysqli_query($con, $sql_func);

// Atualiza os campos de endereço
$sql_endereco = "UPDATE endereco SET 
    cep_end='".$cep_end."', 
    rua_end='".$rua_end."', 
    num_end='".$num_end."', 
    compl_end='".$compl_end."', 
    bairro_end='".$bairro_end."', 
    cidade_end='".$cidade_end."', 
    estado_end='".$estado_end."' 
    WHERE id_end='".$id_end."';";
$resultado_endereco = mysqli_query($con, $sql_endereco);

// Verifica se ambas as atualizações foram bem-sucedidas
if ($resultado_usuario && $resultado_endereco && $resultado_func) {
    header('Location: /sisescala/home.php?page=perfil_func&msg=2');
} else {
    echo "Erro ao atualizar os dados:<br>";
    echo "Erro na atualização do usuário: " . mysqli_error($con) . "<br>";
    echo "Erro na atualização do endereço: " . mysqli_error($con) . "<br>";
    header('Location: /sisescala/home.php?page=perfil_func&msg=6');
}
if (!$resultado_usuario) {
    echo "Erro na atualização do usuário: " . mysqli_error($con) . "<br>";
}
if (!$resultado_endereco) {
    echo "Erro na atualização do endereço: " . mysqli_error($con) . "<br>";
}

mysqli_close($con);
?>