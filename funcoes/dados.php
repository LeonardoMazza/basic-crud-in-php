<?php 

$nome_site     = "Mazza";
$desc_site     = "Crud Simples";
$titulo_pagina = $nome_site." - ".$desc_site;

$modelo_template = "/modelo";
$template = "/template" . $modelo_template;


session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
    $logado = false;
    
}else{

    $logado = true;
}