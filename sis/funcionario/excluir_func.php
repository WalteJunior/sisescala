<?php
$id = (int) $_GET['id_func'];
 
$sql = "delete from endereco where id_func = '$id';"; 

$resultado = mysqli_query($con, $sql);

if ($resultado) {
    $sql2 = "delete from funcionario where id_func = '$id';";
    $resultado2 = mysqli_query($con, $sql2);
    header('Location: \siscrud/index.php?page=lista_func&msg=3');
    mysqli_close($con);
}else{
    header('Location: \siscrud/index.php?page=lista_func&msg=4');
    mysqli_close($con);
}
?>
