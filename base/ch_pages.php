<?php
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'home':
            include 'base/home.php';
            break;
        
        // ---- Escalas e Horarios ----///
        case 'escala':
            include 'sis/escalas/escala.php';
            break;

        case 'gera':
            include 'sis/escalas/gera_escala.php';
            break;

        case 'insere':
            include 'sis/escalas/insere_escala.php';
            break;

        case 'view_escala':
            include 'sis/escalas/view_escala.php';
            break;

        // ---- Relatorios ----///
        case 'rel_func':
            include 'relatorio/rel_func.php';
            break;
        case 'par_sup_adm':
                include 'relatorio/par_sup_adm.php';
                break;
        case 'rel_sup_adm':
            include 'relatorio/rel_sup_adm.php';
            break;
        
        // ---- Funcionairos ----///
        case 'lista_func':
            include "sis/funcionario/lista_func.php";
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
                

        case 'view_func':
            include "sis/funcionario/view_func.php";
            break;


        case 'excluir_func':
            include "sis/funcionario/excluir_func.php";
            break;

        case 'atualiza_func':
            include "sis/funcionario/atualiza_func.php";
            break;


        // ---- Perfil usuarios/funcionarios ----///
        case 'perfil_func':
            include "sis/funcionario_perfil/perfil_func.php";
            break;

        case 'fedita_funcsup':
            include "sis/funcionario_perfil/fedita_funcsup.php";
            break;

        case 'lista_funcsup':
            include "sis/funcionario_perfil/lista_funcsup.php";
            break;


        // ---- Substituição ----///
        case 'lista_sub':
            include "sis/substituicao/lista_sub.php";
            break;
            
        case 'fadd_sub':
            include "sis/substituicao/fadd_sub.php";
            break;
                
        case 'insere_sub':
             include "sis/substituicao/insere_sub.php";
            break;
                    
         case 'fedita_sub':
            include "sis/substituicao/fedita_sub.php";
            break;
                
        case 'view_sub':
            include "sis/substituicao/view_sub.php";
            break;

        case 'excluir_sub':
            include "sis/substituicao/excluir_sub.php";
            break;

        case 'atualiza_sub':
            include "sis/substituicao/atualiza_sub.php";
            break;

        case 'reprovar_sub':
            include "sis/substituicao/reprovar_sub.php";
            break;

        case 'aprovar_sub':
            include "sis/substituicao/aprovar_sub.php";
            break;

        case 'analise_sub':
            include "sis/substituicao/analise_sub.php";
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

        case 'view_usu':
            include "sis/usuarios/view_usu.php";
            break;

        case 'atualiza_usu':
            include "sis/usuarios/atualiza_usu.php";
            break;

        case 'block_usu':
            include "sis/usuarios/block_usu.php";
            break;

        case 'ativa_usu':
            include "sis/usuarios/ativa_usu.php";
            break;
            
        case 'insere_cad':
            include "sis/usuarios/insere_cad.php";
            break;

        // ---- CADASTRO USUÁRIOS ----///
        case 'atualiza_usu2':
            include "sis/usuarios/atualiza_usu2.php";
            break;

        case 'funceusu.php':
            include "sis/cadastro/funceusu.php";
            break;
    
        case 'fedita_usu2':
            include "sis/usuarios/fedita_usu2.php";
            break;
            


        default:
            include "base/home.php";
            break;
    }
}
