<?php

if($_GET['id']){

    $id = $_GET['id'];   
    $email = ($_POST['inputEmail']);
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindValue('id', $id);
    $stmt->execute();
    
    $verifica = $stmt->rowCount();
    if($verifica == 1){
        $stmt = $con->prepare('UPDATE usuarios SET email = :email WHERE id = :id');
        $stmt->execute(array(
          ':id'   => $id,
          ':email' => $email
        ));
        $msg = "Usuario atualizado!";
        echo '<script>alert("'.$msg.'");</script>';   
        header("location: ?pagina=painel");
        
    }else{
        header("location: ?pagina=painel");
    }


}else{
    header("location: ?pagina=painel");
}