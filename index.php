<?php include'header.php' ?>
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
        <a class="waves-effect waves-light btn orange darken-3" id="logar">Confirmar</a>
    </div>
</div>
<img class="responsive-img" src="img/background1.jpg">
<img class="responsive-img" src="img/frete.png">
<div class="container">

    <div class="col s12 m9 l10">
        <div class="row">
            <?php
                        $sql = "SELECT * FROM produto limit 6";
                        $query = $con->query($sql);
                        while($fetch = $query->fetch_assoc()){
                        ?>
                <div class="col m4 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="uploads/<?= $fetch["foto"] ?>">
                        </div>
                        <div class="card-content">
                            <h5><?= $fetch["nome"] ?></h5>
                            <h5 class="orange-text">R$<?= $fetch["preco"] ?></h5>
                            <p>
                                <?= $fetch["descri"] ?>
                            </p>
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
<?php include'footer.php' ?>