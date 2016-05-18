<!DOCTYPE html>

<html lang="en">
<?php
include('head.php');
if(isset($_POST['prodaltera'])){
    $idprod = $_POST['prodaltera'];
    $sql = "select * from produto where id = $idprod";
    $run = $con->query($sql);
    $valor = $run->fetch_assoc();
?>
        <div id="form-cria-produto" class="container">
            <h4>
        Atualizar Produto
    </h4>
            <div>
                <form class="col s12" method="post" action="atualizaproduto.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="nome" type="text" class="validate" name="nome" value="<?=$valor['nome']?>">
                            <label for="nome">Nome do produto</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">attach_money</i>
                            <input id="icon_prefix" type="number" class="validate" name="valor" value="<?=$valor['preco']?>"placeholder="10.00">
                            <label for="icon_prefix">Valor</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="desc"> <?=$valor['descri']?> </textarea>
                            <label for="textarea1">Descrição do produto</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$valor['id']?>">
                    <input type="hidden" name="fotoantiga" value="<?=$valor['foto']?>">
                    <img src="uploads/<?=$valor['foto']?>" class="responsive-img">
                    <div class="file-field input-field l6">
                        <div class="btn">
                            <span>Imagem</span>
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecione uma imagem">
                        </div>
                    </div>
                    <input type="submit" value="Confirmar" class="waves-effect waves-light btn">
                </form>
            </div>
        </div><br>

<?php
}else{
    echo'erro';
}
    include('footer.php');
?>
