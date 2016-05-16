<?php
include("header.php");
if(!isset($_GET['id'])){
    header('location: index.php');
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
            <div class="col l12">
                <br>
                <br>
                <h5><?= $fetch['nome'] ?></h5>
                <br>
                <br>
            </div>

            <div class="col s12 m8 l8 left">
                <img class="materialboxed responsive-img" width="400" src="uploads/<?= $fetch['foto'] ?>">
            </div>

            <div class="col s12 m4 l4 center">
                <h3 class="orange-text darken-3"><b>R$<?= $fetch['preco'] ?></b></h3> Escolha um <b>TAMANHO</b>
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>--</option>
                        <?= ($estoque['p'] > 0)? "<option value='p'>P</option>":"" ?>
                        <?= ($estoque['m'] > 0)? "<option value='m'>M</option>":"" ?>
                        <?= ($estoque['g'] > 0)? "<option value='g'>G</option>":"" ?>
                        <?= ($estoque['gg'] > 0)? "<option value='gg'>GG</option>":"" ?>
                    </select>
                </div>
                <br>
                <br>
                <a class="waves-effect waves-light btn orange darken-3" href="add_car.php?prod=<?= $fetch['id'] ?>"><i class="material-icons left white-text">shopping_cart</i>COMPRAR</a>
            </div>

            <div class="col s12 m12 l12">
                <br>
                <br>
                <div class="divider"></div>
                <h5><b>Detalhes do produto</b></h5>
                <p>
                    <?= $fetch['descri'] ?>
                </p>
            </div>
        </div>
    </div>

    <?php

    }
}else{
echo"<center><h3>Produto não encontrado</h3></center>";
}
    include("footer.php");
?>
