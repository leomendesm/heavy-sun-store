<?php
include("head.php");
if(!isset($_GET['id'])){
    header('location: home');
}
$id = $_GET["id"];
$sql = "select * from produto where id = $id";
$query = $con->query($sql);
$cont = $query->num_rows;
if($cont == 1){
    if($fetch = $query->fetch_assoc()){
        $sql2 = "select * from estoque where id_prod = $id";
        $run = $con->query($sql2);
        $estoque = $run->fetch_assoc();
?>
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8 left">
                <img class="materialboxed responsive-img" width="400" src="/projeto/uploads/<?= $fetch['foto'] ?>">
            </div>
            <div class="col s12 m4 l4 center">
            <br>
            <h4><?= $fetch['nome'] ?> - <?= ucfirst($fetch['sexo']) ?></h4>
            <div class="hide-on-med-and-down"><br><br><h5>Detalhes do produto</h5>
                <p>
                    <?= $fetch['descri'] ?>
                </p> <br></div>
                <h3 class="orange-text darken-3"><b>R$<?= $fetch['preco'] ?></b></h3> Escolha um <b>TAMANHO</b>
                <div class="input-field">
                    <select id="selecttam">
                        <option value="" disabled selected>--</option>
                        <?= ($estoque['p'] > 0)? "<option value='p'>P</option>":"" ?>
                        <?= ($estoque['m'] > 0)? "<option value='m'>M</option>":"" ?>
                        <?= ($estoque['g'] > 0)? "<option value='g'>G</option>":"" ?>
                        <?= ($estoque['gg'] > 0)? "<option value='gg'>GG</option>":"" ?>
                    </select>
                </div>
                <br>
                <br>
                <input type="hidden" id="idprod" value="<?= $fetch['id'] ?>">
                <a id="comprar" class="waves-effect waves-light btn orange darken-3  <?= (isset($_SESSION['id']))? "":"disabled" ?>"><i class="material-icons left white-text">shopping_cart</i>COMPRAR</a>

            </div>

        </div>
        <div class="hide-on-large-only center"><h5>Detalhes do produto</h5>
                <p>
                    <?= $fetch['descri'] ?>
                </p></div>
    </div>

    <?php

    }
}else{
echo"<center><h3>Produto não encontrado</h3></center>";
}
    include("footer.php");
?>

