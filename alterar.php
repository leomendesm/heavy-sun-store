<?php
    include("head.php");
    $id = $_SESSION['id'];
    $sql = "select * from user where id = $id";
    $run = $con->query($sql);
    $valor = $run->fetch_assoc();
?>
            <div class="container">
                <div class="row">
                    <div class="col l12">
                        <br><br>
                        <h5><b>Alterar Cadastro</b></h5>
                        <div class="divider"></div>
                        <br><br>
                        <form class="col s12" id="formregister" action="atualiza.php" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nome" type="text" class="validate" value="<?= $valor['nome'] ?>" name="anome">
                                    <label for="nome">Nome Completo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate" value="<?= $valor['email'] ?>" name="aemail">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="end" type="text" class="validate"  value="<?= $valor['end'] ?>" name="aend">
                                    <label for="end">Endereço</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <input id="cep" type="text" class="validate" name="acep" value="<?= $valor['cep'] ?>">
                                    <label for="cep">CEP</label>
                                </div>
                                <div class="input-field col s12 l6">
                                    <input id="cpf" type="text" class="validate" name="acpf" value="<?= $valor['cpf'] ?>">
                                    <label for="cpf">CPF</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 l6">
                                    <input id="pass" type="password" class="validate"  name="asenha">
                                    <label for="pass">Senha</label>
                                </div>
                                <div class="input-field col s12 l6">
                                    <input id="cpass" type="password" class="validate" name="acsenha">
                                    <label for="cpass">Confirmar Senha</label>
                                </div>
                            </div>
                            <div class="modal-footer"><input type="submit" class="waves-effect waves-light btn orange darken-3 right" value="Confirmar"></div>
                        </form>
                        <br><br><br><br>
                    </div>                   
                </div>
            </div>
            
<?php
    
    include("footer.php");
?>
