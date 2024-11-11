<?php
$id		  		= $_POST["id"];
$nome 			= $_POST["nome"];
$usuario		= $_POST["usuario"];
$email			= $_POST["email"];
$id_end         = $_POST['id_end'];
$cep_end        = $_POST['cep_end'];
$rua_end        = $_POST['rua_end'];
$num_end        = $_POST['num_end'];
$compl_end      = $_POST['compl_end'];
$bairro_end     = $_POST['bairro_end'];
$cidade_end     = $_POST['cidade_end'];
$estado_end     = $_POST['estado_end'];

// Consulta o nível atual do usuário
$sql_nivel = "SELECT nivel FROM usuarios WHERE id = '".$id."'";
$result_nivel = mysqli_query($con, $sql_nivel);
$row_nivel = mysqli_fetch_assoc($result_nivel);
$nivel = $row_nivel['nivel']; // Mantém o nível atual do banco de dados

// Atualiza apenas os campos editáveis
$sql = "UPDATE usuarios SET ";
$sql .= "nome='".$nome."', usuario='".$usuario."', email='".$email."', dt_cadastro=now() ";
$sql .= "WHERE id = '".$id."';";

$resultado = mysqli_query($con, $sql);

if($resultado){
	header('Location: \sisescala/home.php?page=perfil_func&msg=2');
    mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=perfil_func&msg=6');
    mysqli_close($con);
}

?>
