<?php 
switch(@$_GET['pagina']){

    case "painel":
        require_once ROOT_PATH . "/controladores/dashboard/painel.php";
    break;

    case "alterar":
        require_once ROOT_PATH . "/controladores/dashboard/alterar.php";
    break;

    case "editar":
        require_once ROOT_PATH . "/controladores/dashboard/editar.php";
    break;
    
    case "sair":
        require_once ROOT_PATH . "/controladores/dashboard/sair.php";
    break;

    case "apagar":
        require_once ROOT_PATH . "/controladores/dashboard/apagar.php";
    break;

    default:
        require_once ROOT_PATH . "/controladores/dashboard/inicio.php";
    break;

}