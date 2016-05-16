<!DOCTYPE html>
<html lang="en">
<?php
    include('conecta.php');
    if(!isset($_SESSION["id"])){
        $hide = "hide";
        $nhide = null;
    }else{
        $nhide = "hide";
        $hide = null; 
    }
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
        <title>Heavy Sun Clothing</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    </head>

    <body>
        <header>
            <nav class="top-nav black">
                <div class="container">
                    <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                </div>
                <div class="container">
                    <div class="nav-wrapper"><span id="logo-container" class="brand-logo"></span></div>
                </div>
                <div class="nav-wrapper black">
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="loja.html" class="<?=$hide?>">Minha Conta</a></li>
                        <li><a href="#mlogin" class="modal-trigger <?=$nhide?>">login</a></li>
                        <li><a href="#mcad" class="modal-trigger <?=$nhide?>">Cadastrar</a></li>
                        <li><a href="#"><i class="material-icons">search</i></a></li>
                        <li><a href="#"><i class="material-icons <?=$hide?>">shopping_cart</i></a></li>
                    </ul>
                </div>
            </nav>

            <ul id="nav-mobile" class="side-nav fixed">
                <ul id="slide-out" class="side-nav fixed">
                    <li class="logo black center">
                        <a href="index.html" id="logo-container"><img src="img/logo.png"></a>
                        <br>
                    </li>
                    <li><a class="black white-text" href="#!"><b>MASCULINO</b></a></li>
                    <li><a href="#!">CAMISETAS</a></li>
                    <li><a href="#!">BLUSA MOLETOM</a></li>
                    <li><a class="black white-text" href="#!"><b>FEMININO</b></a></li>
                    <li><a href="#!">CAMISETAS</a></li>
                    <li><a href="#!">BLUSA MOLETOM</a></li>
                </ul>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </header>

        <main>
            <div id="mcad" class="modal">
                <div class="modal-content">
                    <h4>Cadastro</h4>
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
            <div id="mlogin" class="modal">
                <div class="modal-content">
                    <h4>Login</h4>
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
            <div class="container">
                <img class="responsive-img" src="img/background1.jpg">
                <img class="responsive-img" src="img/frete.png">
                <div class="col s12 m9 l10">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM produto limit 6";
                        $query = $con->query($sql);
                        while($fetch = $query->fetch_assoc()){
                        ?>
                            <div class="col m4 l3">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/background3.jpg">
                                    </div>
                                    <div class="card-content">
                                        <h5>Camiseta - THE Animals</h5>
                                        <h5 class="orange-text">R$00,00</h5>
                                        <p>I am a very simple card.</p>
                                    </div>
                                    <div class="card-action black">
                                        <a href="#">COMPRAR</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                    </div>
                </div>
            </div>
        </main>

        <footer class="page-footer black" style="position: -webkit-sticky;">
            <div class="container">
                <div class="row">
                    <div class="col l9 m9 s12">
                        <h5 class="white-text">HEAVY SUN CLOTHING</h5>
                        <p class="grey-text text-lighten-4">Descrição</p>
                    </div>
                    <div class="col l3 m3 offset-m3">
                        <ul>
                            <li><a class="white-text" href="/login">Login</a></li>
                            <li><a class="white-text" href="/contact_us">Carrinho</a></li>
                            <li><a class="white-text" href="/about">Sobre</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright grey darken-4">
                <div class="container">
                    Todos os direitos reservados
                </div>
            </div>
        </footer>
    </body>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="js/init.js"></script>

</html>