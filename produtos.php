<!DOCTYPE html>

<html lang="en">
<?php
include('head.php');
    if(!isset($_SESSION['auto'])){
        echo"<script>location.href = 'http://www.google.com'</script>";
    }else{
        if($_SESSION['auto'] != 1){
        echo"<script>location.href = 'http://www.google.com'</script>";
        }
    }
?>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active black-text" href="#produto">Produto</a></li>
                <li class="tab col s3"><a class="black-text" href="#estoque">Estoque</a></li>
                <div class="indicator black" style="z-index:1"></div>
            </ul>
        </div>

        <div id="produto" class="col s12">
            <div class="row">
                <div id="form-cria-produto" class="container">
                    <h4>Cadastrar Produto</h4>
                    <div>
                        <form name="eoq" class="col s12" method="post" action="criar.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="nome" type="text" class="validate" name="nome">
                                    <label for="nome">Nome do produto</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_money</i>
                                    <input id="icon_prefix" type="number" class="validate" name="valor" placeholder="10.00">
                                    <label for="icon_prefix">Valor</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea" name="desc"></textarea>
                                    <label for="textarea1">Descrição do produto</label>
                                </div>


                            </div>
                            <div class="file-field input-field l6">
                                <div class="btn  orange darken-3">
                                    <span>Imagem</span>
                                    <input type="file" name="foto" id="foto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Selecione uma imagem">
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="form-atualiza-produto" class="col l6">
                    <br>
                    <h4>Atualizar produto</h4>
                    <div>
                        <form class="col s12" method="post" action="form_atualiza_produto.php">
                            <div class="row">
                                <div class="input-field col s6 m6 l12">
                                    <select class="icons" name="prodaltera">
                                        <option value="" disabled selected>Produto</option>
                                        <?php
                            $query = "SELECT id, nome, foto FROM produto";
                            $run = $con->query($query);
                            while($valor = $run->fetch_assoc()){
                                    echo '<option value="'.$valor['id'].'"data-icon="uploads/'.$valor["foto"].'" class="circle"><span class="black-text">'.$valor["nome"].'</span></option>';
                                    } ?>
                                    </select>
                                    <label>Selecione um produto</label>
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
                    </div>
                </div>
                <br>
                <div id="form-remove-produto" class="col l6">
                    <h4>Remover produto</h4>
                    <div>
                        <form class="col s12" method="post" action="removerproduto.php">
                            <div class="row">
                                <div class="input-field col s6 m6 l12">
                                    <select class="icons" name="iddelete">
                                        <option value="" disabled selected>Produto</option>
                                        <?php
                            $query = "SELECT id, nome, foto FROM produto";
                            $run = $con->query($query);
                            while($valor = $run->fetch_assoc()){
                                    echo '<option value="'.$valor['id'].'"data-icon="uploads/'.$valor["foto"].'" class="circle">'.$valor["nome"].'</option>';
                                    } ?>
                                    </select>
                                    <label>Selecione um produto</label>
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="estoque" class="col s12">
            <div class="row">
                <div id="form-adiciona-estoque" class="container">
                    <h4>Adicionar ao Estoque</h4>
                    <div>
                        <form class="col s12" method="post" action="estocar.php">
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <select class="icons" name="idprod">
                                        <option value="" disabled selected>Produto</option>
                                        <?php
                            $query = "SELECT id, nome, foto FROM produto";
                            $run = $con->query($query);
                            while($valor = $run->fetch_assoc()){
                                    echo '<option value="'.$valor['id'].'"data-icon="uploads/'.$valor["foto"].'" class="circle">'.$valor["nome"].'</option>';
                                    } ?>
                                    </select>
                                    <label>Selecione um produto</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="p">
                                    <label for="nome">P</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="m">
                                    <label for="nome">M</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="g">
                                    <label for="nome">G</label>
                                </div>
                                <div class="input-field col l3">
                                    <input id="nome" type="number" class="validate" name="gg">
                                    <label for="nome">GG</label>
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="form-atualiza-produto" class="col l6">
                    <br>
                    <h4>Atualizar Estoque</h4>
                    <div>
                        <form class="col s12" method="post" action="form_atualiza_estoque.php">
                            <div class="row">
                                <div class="input-field col s6 m6 l12">
                                    <select class="icons" name="idestoque">
                                        <option value="" disabled selected>Produto</option>
                                        <?php
                            $query = "SELECT id, nome, foto FROM produto";
                            $run = $con->query($query);
                            while($valor = $run->fetch_assoc()){
                                    echo '<option value="'.$valor['id'].'"data-icon="uploads/'.$valor["foto"].'" class="circle">'.$valor["nome"].'</option>';
                                    } ?>
                                    </select>
                                    <label>Selecione um produto</label>
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                        </form>
                    </div>
                </div>
                <br>
                <div id="form-remove-produto" class="col l6">
                    <h4>Remover Do Estoque</h4>
                    <div>
                        <form class="col s12" method="post" action="removerproduto.php">
                            <div class="row">
                                <div class="input-field col s6 m6 l12">
                                    <select class="icons" name="iddelete">
                                        <option value="" disabled selected>Produto</option>
                                        <?php
                                            $query = "SELECT id, nome, foto FROM produto";
                                            $run = $con->query($query);
                                            while($valor = $run->fetch_assoc()){
                                                echo '<option value="'.$valor['id'].'"data-icon="uploads/'.$valor["foto"].'" class="circle">'.$valor["nome"].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label>Selecione um produto</label>
                                </div>
                            </div>
                            <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php
    include('footer.php');
?>
