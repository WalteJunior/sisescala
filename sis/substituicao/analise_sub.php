<?php
$id = (int) $_GET['id'];

$sql = "update substituicao set ";
$sql .= "ativo_sub='Em analise' ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query($con, $sql);

if($resultado){
	header('Location: \sisescala/home.php?page=lista_sub&msg=6');
    mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=lista_sub&msg=7');
    mysqli_close($con);
}
?>
