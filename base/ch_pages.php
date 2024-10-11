<?php
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            include 'base/escala.php';
            break;
        // ---- Funcionairos ----///
        case 'lista_func':
            include "sis/funcionario/lista_func.php";
            break;

        case 'lista_funcsup':
            include "sis/funcionario/lista_funcsup.php";
            break;
            
         case 'fadd_func':
                include "sis/funcionario/fadd_func.php";
                break;
                
        case 'insere_func':
             include "sis/funcionario/insere_func.php";
            break;
                    
         case 'fedita_func':
             include "sis/funcionario/fedita_func.php";
             break;
                        
            case 'fedita_funcsup':
             include "sis/funcionario/fedita_funcsup.php";
             break;

        case 'view_func':
            include "sis/funcionario/view_func.php";
            break;

        case 'perfil_func':
            include "sis/funcionario/perfil_func.php";
            break;

        case 'excluir_func':
            include "sis/funcionario/excluir_func.php";
            break;

        case 'atualiza_func':
            include "sis/funcionario/atualiza_func.php";
            break;

        // ---- USUÁRIOS ----///
        case 'lista_usu':
            include "sis/usuarios/lista_usu.php";
            break;

        case 'fadd_usu':
            include "sis/usuarios/fadd_usu.php";
            break;

        case 'insere_usu':
            include "sis/usuarios/insere_usu.php";
            break;

        case 'fedita_usu':
            include "sis/usuarios/fedita_usu.php";
            break;

            case 'fedita_usu2':
                include "sis/usuarios/fedita_usu2.php";
                break;

        case 'view_usu':
            include "sis/usuarios/view_usu.php";
            break;

        case 'atualiza_usu':
            include "sis/usuarios/atualiza_usu.php";
            break;
        case 'atualiza_usu2':
            include "sis/usuarios/atualiza_usu2.php";
            break;

        case 'block_usu':
            include "sis/usuarios/block_usu.php";
            break;

        case 'ativa_usu':
            include "sis/usuarios/ativa_usu.php";
            break;


            case 'funceusu.php':
                include "sis/cadastro/funceusu.php";
                break;
    
            case 'insere_cad':
                include "sis/usuarios/insere_cad.php";
                break;
    
            


        default:
            include "base/escala.php";
            break;
    }
}
