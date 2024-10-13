<?php
$id = (int) $_GET['id'];

$sql = "update substituicao set ";
$sql .= "ativo_sub='Aprovado' ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query($con, $sql);

if($resultado){
	header('Location: \sisescala/home.php?page=lista_sub&msg=4');
    mysqli_close($con);
}else{
	header('Location: \sisescala/home.php?page=lista_sub&msg=7');
    mysqli_close($con);
}
?>
