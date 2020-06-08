<?php

if($_GET["id"]){

    $id = $_GET['id'];    
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindValue('id', $id);
    $stmt->execute();
    
    $verifica = $stmt->rowCount();
    if($verifica == 1){
        $stmt = $con->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->bindParam(':id', $id); 
        $stmt->execute();
        $msg = "Usuario deletado!";
        echo '<script>alert("'.$msg.'");</script>';   
        header("location: ?pagina=painel");
    }else{
        header("location: ?pagina=painel");
    }


}else{
    header("location: index.php");
}