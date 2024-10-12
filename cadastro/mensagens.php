<?php 
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];

    switch($msg){
        case 1:
            echo '<script>alert("Você foi cadastrado com sucesso!");</script>';
            break;

        case 6:
            echo '<script>alert("Erro ao acessar a Base de dados! Contate o administrador!");</script>';
            break;
    }
    $msg = 0;
}
?>
