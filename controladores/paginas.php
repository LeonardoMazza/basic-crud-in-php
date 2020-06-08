<?php 
switch(@$_GET['pagina']){

    case "entrar":
        require_once ROOT_PATH . "/controladores/entrar.php";
    break;

    case "cadastro":
        require_once ROOT_PATH . "/controladores/cadastrar.php";
    break;

    default:
        require_once ROOT_PATH . "/controladores/inicio.php";
    break;

}