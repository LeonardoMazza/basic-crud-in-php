<?php
require_once ROOT_PATH . $template ."/cadastrar.html";

$email = @$_POST["inputEmail"];
//Remove os caracteres ilegais, caso tenha
$email = filter_var($email, FILTER_SANITIZE_EMAIL);     


//Verifica se o botão de cadastro foi solicitado
if(isset($_POST['cadastrar'])){
    //Verifica se email e senha foram preenchidos
    if($_POST['inputEmail'] && $_POST['inputPassword']){     
        //Verifica se a senha tem menos de 8 digitos
        if((strlen($_POST['inputPassword']) < 8 )){
            $msg = "Sua senha precisa ter 8 digitos.";
            echo '<script>alert("'.$msg.'");</script>';   
        }
        // Valida o e-mail
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "$email não é um e-mail válido.";
            echo '<script>alert("'.$msg.'");</script>';   
        }
        else {
            
            // hash para fortalecar a criptografia
            $hash = "mazza123";
            $senha = sha1($_POST['inputPassword'] . $hash);
            $stmt = $con->prepare("INSERT INTO usuarios(email, senha) VALUES(?, ?)");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
            $stmt->execute();
            $msg = "Cadastro efetuado com sucesso!";
            echo '<script>alert("'.$msg.'");</script>';          
        }
    }
    else{
        $msg = "Preencha todos os campos!";
        echo '<script>alert("'.$msg.'");</script>';   
    }
}