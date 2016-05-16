<?php
    include("header.php");
?>

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
                    <a class="waves-effect waves-light btn orange darken-3">Confirmar</a>                    
                </div>
            </div>  

            <div class="container">
                <div class="row">
                    <div class="col l12">
                        <br><br>
                        <h5><b>Alterar Cadastro</b></h5>
                        <div class="divider"></div>
                        <br><br>
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
                            <div class="modal-footer"><a id="submit" class="waves-effect waves-light btn orange darken-3 right">Confirmar</a>
                        </form>
                        <br><br><br><br>
                    </div>                   
                </div>
            </div>
            
<?php
    include("footer.php");
?>
