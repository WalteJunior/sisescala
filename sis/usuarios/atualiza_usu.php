<?php
$id		  		= $_POST["id"];
$nome 			= $_POST["nome"];
$usuario		= $_POST["usuario"];
$email			= $_POST["email"];
$nivel			= $_POST["nivel"];

$sql = "update usuarios set ";
$sql .= "nome='".$nome."', usuario='".$usuario."', email='".$email."', nivel='".$nivel."', dt_cadastro=now() ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query($con, $sql);

if($resultado){
	header('Location: \sisescala/home.php?page=lista_usu&msg=2');
    mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=lista_usu&msg=6');
    mysqli_close($con);
}

?>

