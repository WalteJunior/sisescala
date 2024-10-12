<?php
$id = (int) $_GET['id'];

$sql = "update usuarios set ";
$sql .= "ativo='1' ";
$sql .= "where id = '".$id."';";

$resultado = mysqli_query($con, $sql);

if($resultado){
	header('Location: \sisescala/index.php?page=lista_usu&msg=5');
    mysqli_close($con);
}else{
	header('Location: \sisescala/index.php?page=lista_usu&msg=6');
    mysqli_close($con);
}
?>
