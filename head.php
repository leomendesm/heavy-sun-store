<?php
    include('conecta.php');
    if(!isset($_SESSION['id']) && isset($_COOKIE['user']) && isset($_COOKIE['senha'])){
        header('location: logarcookie.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
        <title>Heavy Sun Clothing</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/projeto/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/projeto/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

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
                        <li><a class="white-text" href="/projeto/home">HOME</a></li>
                        <li id="prodger"><a class="white-text" href="/projeto/gerenciar">GERENCIAR</a></li>
                        <li id="acc"><a class="white-text" href="/projeto/alterar">MINHA CONTA</a></li>
                        <li id="logout"><a class="white-text" href="logout.php">LOGOUT</a></li>
                        <li id="log"><a href="#mlogin" class="modal-trigger white-text">LOGIN</a></li>
                        <li id="cad"><a href="#mcad" class="modal-trigger orange-text">CADASTRE-SE</a></li>
                        <li id="shop"><a href="/projeto/cart" class="white-text"><i class="material-icons left">shopping_cart</i>Carrinho</a></li>
                    </ul>
                </div>
                <ul id="nav-mobile" class="side-nav">
                    <li><a  href="/projeto/home">HOME</a></li>
                    <li id="mprodger"><a class="" href="produtos.php">GERENCIAR</a></li>
                    <li id="macc"><a class="" href="alterar.php">MINHA CONTA</a></li>
                    <li id="mlogout"><a class="" href="logout.php">LOGOUT</a></li>
                    <li id="mlog"><a href="#mlogin" class="modal-trigger ">LOGIN</a></li>
                    <li id="mcadastro"><a href="#mcad" class="modal-trigger orange-text">CADASTRE-SE</a></li>
                    <li id="mshop"><a href="cart.php">Carrinho</a></li>
                </ul>
            </nav>

            <ul id="nav-mobile" class="side-nav fixed">
                <ul id="slide-out" class="side-nav fixed">
                    <li class="logo black center">
                        <a href="/projeto/home" id="logo-container"><img src="/projeto/img/logo.png"></a>
                        <br>
                        <br>
                    </li>
                    <li><a class="black white-text" href="/projeto/produtos/masculino"><b>MASCULINO</b></a></li>
                    <li><a href="/projeto/produtos/masculino/camiseta">CAMISETAS</a></li>
                    <li><a href="/projeto/produtos/masculino/moleton">BLUSA MOLETOM</a></li>
                    <li><a class="black white-text" href="/projeto/produtos/feminino"><b>FEMININO</b></a></li>
                    <li><a href="/projeto/produtos/feminino/camiseta">CAMISETAS</a></li>
                    <li><a href="/projeto/produtos/feminino/moleton">BLUSA MOLETOM</a></li>
                </ul>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </header>
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
            <div class="modal-footer"><a id="submit" class="waves-effect waves-light btn orange darken-3">Confirmar</a>
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
                                <input id="lsenha" type="password" class="validate" name="senha">
                                <label for="lsenha">Senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <p>
                                    <input type="checkbox" id="remember" name="remember" value="true" />
                                    <label for="remember">Lembrar-se</label>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a id="logar" class="waves-effect waves-light btn orange darken-3">Confirmar</a>
            </div>
        </div>
        <main>
