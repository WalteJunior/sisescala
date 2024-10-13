<?php
$id = (int) $_GET['id'];

$sql = "update substituicao set ";
$sql .= "ativo_sub='Reprovado' ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query($con, $sql)or die(mysqli_error($con));

if($resultado){
	header('Location: \sisescala/home.php?page=lista_sub&msg=5');
	mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=lista_sub&msg=7');
	mysqli_close($con);
}

?>
