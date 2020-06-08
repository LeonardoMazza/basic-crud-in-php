<?php
define('ROOT_PATH', dirname(__FILE__));

require_once ROOT_PATH . "/controladores/topo.php"; 

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $logado = false;
    require_once ROOT_PATH . "/controladores/paginas.php"; 
}else{
    require_once ROOT_PATH . "/controladores/dashboard/paginas.php"; 
    $logado = true;
}


require_once ROOT_PATH . "/controladores/rodape.php";