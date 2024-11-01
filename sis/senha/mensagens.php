<?php 
if(isset($_GET['warn'])){
    $wrn = $_GET['warn'];

    switch($wrn){
        case 1:
            echo '<script>alert("Senha atualizada com sucesso!!");</script>';
            break;

        case 6:
            echo '<script>alert("Erro ao atualizar a senha! Contate o administrador!");</script>';
            break;
    }
    $wrn = 0;
}
?>