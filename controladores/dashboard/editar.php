<?php


if($_GET["id"]){

    $id = $_GET['id'];    
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindValue('id', $id);
    $stmt->execute();
    
    $verifica = $stmt->rowCount();

    if($verifica == 1){
    ?>  
        <main role="main" class="container">
        <div class="starter-template">
        <h1>Painel de Gerenciamento do CRUD</h1>
        <?php
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form method="POST" action="?pagina=alterar&id=<?=$row['id']?>">
        <table style="width: 50%;" border align="center">
            <tr>
                <td >
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?=$row["email"]?>" placeholder="<?=$row["email"]?>" required>
                </td>
                <td style="width: 15%;">
                    <input type="submit" value="Alterar">
                </td>
                <td style="width: 15%;">
                    <a href="?pagina=apagar&id=<?=$row['id']?>">Apagar</a>
                </td>
            </tr>
        </table>
        </form>
        <?php
        }
        ?>
        </div>
        

</main><!-- /.container -->
<?php 
    }else{
        header("location: ?pagina=painel");
    }


}else{
    header("location: index.php");
}