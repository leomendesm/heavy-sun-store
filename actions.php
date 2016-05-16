<!DOCTYPE html>

<html lang="en">
<?php
include('conecta.php');
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
        <title>Parallax Template - Materialize</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    </head>

    <body>

        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Modal</a>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>
        Cadastro
    </h4>
                <div>
                    <form class="col s12" id="formregister">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nome" type="text" class="validate" name="nome">
                                <label for="nome">Nome Completo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l6">
                                <input id="pass" type="password" class="validate" name="senha">
                                <label for="pass">Senha</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <input id="cpass" type="password" class="validate" name="csenha">
                                <label for="cpass">Confirmar Senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="end" type="text" class="validate" name="enderec">
                                <label for="end">Endereço</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l6">
                                <input id="cep" type="text" class="validate" name="cep">
                                <label for="cep">CEP</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <input id="cpf" type="text" class="validate" name="cpf">
                                <label for="cpf">CPF</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"><a id="submit" class="waves-effect waves-light btn">Confirmar</a>
            </div>
        </div>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h4>
        Login
    </h4>
                <div>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="lemail" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="senha" type="password" class="validate" name="senha">
                                <label for="password">Senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <p>
                                    <input type="checkbox" id="test6" name="remember" />
                                    <label for="test6">Lembrar-se</label>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="waves-effect waves-light btn">Confirmar</a>
                <a href="#!" class=" modal-action modal-close btn-flat">Cancelar</a>
            </div>
        </div>

        <div id="form-cria-produto" class="container">
            <h4>
        Cadastrar Produto
    </h4>
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
        </div>
        <div id="form-adiciona-estoque" class="container">
            <h4>
        Adicionar produto ao Estoque
    </h4>
            <div>
                <form class="col s12" method="post" action="estocar.php">
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <select class="icons" name="idprod">
                                <option value="" disabled selected>Peças</option>
                                <?php 
                            $query = "SELECT id, nome, foto FROM produto";
                            $run = $con->query($query);
                            while($valor = $run->fetch_assoc()){
                                //data-icon="imagens/ $valor["foto"] class="circle"
                                
                                    echo '<option value="'.$valor['id'].'"data-icon="imagens/'.$valor["foto"].'" class="circle">'.$valor["nome"].'</option>';
                                    } ?>
                            </select>
                            <label>Selecione um produto</label>
                        </div>

                        <div class="input-field col s6 m6 l6">
                            <select class="icons" name="tamanho">
                                <option value="" disabled selected>Tamanhos</option>
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                                <option value="GG">GG</option>
                            </select>
                            <label>Selecione um tamanho</label>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <select class="icons" name="sexo">
                                <option value="" disabled selected>Sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                            <label>Selecione um Sexo</label>
                        </div>
                        <div class="input-field col l6">
                            <input id="nome" type="number" class="validate" name="quantia">
                            <label for="nome">Quantia</label>
                        </div>
                    </div>
                    <input type="submit" value="Confirmar" class="waves-effect waves-light btn">
                </form>
            </div>
        </div>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="js/init.js"></script>
    </body>

</html>