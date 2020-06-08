<?php
require_once ROOT_PATH . $template ."/entrar.html";

if(isset($_POST['entrar'])){

    if($_POST["inputEmail"] && $_POST["inputPassword"]){
        

        // as variáveis login e senha recebem os dados digitados na página anterior
        $email = $_POST['inputEmail'];
        $hash = "mazza123";
        $senha = sha1($_POST['inputPassword'] . $hash);
        
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindValue('email', $email);
        $stmt->bindValue('senha', $senha);
        $stmt->execute();
        $verifica = $stmt->rowCount();
        
        if($verifica == 1){
            // session_start inicia a sessão
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('location: index.php');
            $msg = "Logado!";
            echo '<script>alert("'.$msg.'");</script>';
        }else{
            $msg = "Dados incorretos!"; 
            echo '<script>alert("'.$msg.'");</script>';
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
            
        }
    }
}