<!DOCTYPE html>

<html lang="en">
<?php
include('head.php');
        if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
if(isset($_POST['idestoque'])){
    $idestoque = $_POST['idestoque'];
    $sql = "select * from estoque where id_prod = $idestoque";
    $run = $con->query($sql);
    $valor = $run->fetch_assoc();

?>
        <div id="form-cria-produto" class="container">
            <h4>
        Atualizar Produto
    </h4>
            <div>
                <form class="col s12" method="post" action="atualiza_estoque.php">
                            <div class="row">
                               <div class="input-field col l3">
                                <input id="valor" type="text" class="validate" name="id" value="<?=$valor['id_prod']?>" disabled>
                                <label for="valor">ID do Produto</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="p" value="<?=$valor['p']?>">
                                    <label for="nome">P</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="m" value="<?=$valor['m']?>">
                                    <label for="nome">M</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="g" value="<?=$valor['g']?>">
                                    <label for="nome">G</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="gg" value="<?=$valor['gg']?>">
                                    <label for="nome">GG</label>
                                </div>
                            </div>
                            <input type="hidden" value="<?=$valor['id']?>" name="idestoque">
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
            </div>
        </div><br>

<?php
}else{
    echo'erro';
}
    include('footer.php');
?>
