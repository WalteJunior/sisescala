<?php
$id		  		= $_POST["id"];
$id_func		= $_POST["id_func"];
$nome 			= $_POST["nome"];
$usuario		= $_POST["usuario"];
$email			= $_POST["email"];
$nivel			= $_POST["nivel"];

$sql = "update usuarios set ";
$sql .= "nome='".$nome."', email='".$email."', nivel='".$nivel."', dt_cadastro=now() ";
$sql .= "where id = '".$id."';";

$sql2 = "update funcionario set ";
$sql2 .= "nome_func='".$nome."', email_func='".$email."'";
$sql2 .= "where id_func = '".$id_func."';";



$resultado = mysqli_query($con, $sql);
$resultado2 = mysqli_query($con, $sql2);


if($resultado && $resultado2){
	header('Location: \sisescala/home.php?page=lista_usu&msg=2');
    mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=lista_usu&msg=6');
    mysqli_close($con);
}

?>

