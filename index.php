<?php include'head.php' ?>

    <div class="container">
    <img class="responsive-img hide center" src="img/background1.jpg">
    <img class="responsive-img" src="img/frete.png">
        <div class="col s12 m9 l10">
            <div class="row">
                <?php
                        $sql = "SELECT * FROM produto limit 6";
                        $query = $con->query($sql);
                        while($fetch = $query->fetch_assoc()){
                        ?>
                    <div class="col m4 l4">
                        <div class="card medium">
                            <div class="card-image">
                                <img src="uploads/<?= $fetch["foto"] ?>">
                            </div>
                            <div class="card-content">
                                <h5><?= $fetch["nome"] ?></h5>
                                <h5 class="orange-text">R$<?= $fetch["preco"] ?></h5>
                            </div>
                            <div class="card-action black">
                                <a href="produto.php?id=<?= $fetch["id"] ?>" class="">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
            </div>
        </div>
    </div>
    <?php include'footer.php' ?>
