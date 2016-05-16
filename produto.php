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
                        <h5>Camiseta - The Animals</h5>
                        <br><br>
                    </div>

                    <div class="col s12 m8 l8 left">
                         <img class="materialboxed responsive-img" width="400" src="img/background3.jpg">
                    </div>

                    <div class="col s12 m4 l4 center">
                        <h3 class="orange-text darken-3"><b>R$00,00</b></h3>                        
                        Escolha um <b>TAMANHO</b>
                        <div class="input-field">
                            <select>
                              <option value="" disabled selected>--</option>
                              <option value="1">P</option>
                              <option value="2">M</option>
                              <option value="3">G</option>
                              <option value="4">GG</option>                              
                            </select>                            
                        </div>

                        <br><br>
                        <a class="waves-effect waves-light btn orange darken-3"><i class="material-icons left white-text">shopping_cart</i>COMPRAR</a>
                    </div>

                     <div class="col s12 m12 l12">
                        <br><br>
                        <div class="divider"></div>
                        <h5><b>Detalhes do produto</b></h5>
                        <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).</p>
                     </div>
                </div>
            </div>

<?php
    include("footer.php");
?>

