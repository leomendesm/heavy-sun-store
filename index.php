<?php include'head.php' ?>

    <div class="container">
    <img class="responsive-img hide center" src="img/background1.jpg">
    <img class="responsive-img" src="img/frete.png">
        <div class="col s12 m9 l10">
            <div class="row">
                <?php
                        $sql = "SELECT * FROM produto ORDER BY RAND() limit 8";
                        $query = $con->query($sql);
                        while($fetch = $query->fetch_assoc()){
                        ?>
                    <div class="col m4 l3">
                        <div class="card medium">
                            <div class="card-image">
                              <img class="responsive-img" src="uploads/<?= $fetch["foto"] ?>">
                            </div>
                            <div class="card-content">
                                <p><span class="card-title activator grey-text text-darken-4 truncate"><?= $fetch["nome"] ?> - <?=  ucfirst($fetch["sexo"]) ?></span></p>
                                <p class="">R$<?= $fetch["preco"] ?><br></p>
                                <div class="red-text"><hr></div>
                              <p><a href="produto.php?id=<?= $fetch["id"] ?>" class="orange-text text-darken-2 right">COMPRAR</a></p>
                            </div>
                          </div>
                    </div>
                    <?php }?>
            </div>
        </div>
    </div>
    <?php include'footer.php' ?>
