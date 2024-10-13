<?php
$id = (int) $_GET['id'];
 
$sql = "delete from substituicao where id = '$id';"; 

$resultado = mysqli_query($con, $sql);

if ($resultado) {
    header('Location: \sisescala/home.php?page=lista_sub&msg=3');
    mysqli_close($con);
}else{
    header('Location: \sisescala/home.php?page=lista_sub&msg=4');
    mysqli_close($con);
}
?>
