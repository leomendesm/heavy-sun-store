<?php
  include 'head.php';
  if(isset($_GET['sexo']) && isset($_GET['categoria'])){
    $sexo = $_GET['sexo'];
    $categoria = $_GET['categoria'];
    $sql = "select * from produto where sexo = '$sexo' and categoria = '$categoria' ORDER BY RAND()";
  }else if(isset($_GET['sexo'])){
    $sexo = $_GET['sexo'];
    $sql = "select * from produto where sexo = '$sexo' ORDER BY RAND()";
  }else if(isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];    
    $sql = "select * from produto where categoria = '$categoria' ORDER BY RAND()";
  }
    $run = $con->query($sql);
    $cont = $run->num_rows;
?>
<div class="container">
<img class="responsive-img hide center" src="img/background1.jpg">
<img class="responsive-img" src="img/frete.png">
    <div class="col s12 m9 l10">
        <div class="row">
            <?php
            if($cont > 0){
              while($fetch = $run->fetch_assoc()){
            ?>
                <div class="col m4 l3">
                    <div class="card medium">
                        <div class="card-image">
                          <img class="responsive-img" src="uploads/<?= $fetch["foto"] ?>">
                        </div>
                        <div class="card-content">
                            <a href="produto.php?id=<?= $fetch["id"] ?>"><p><span class="card-title activator grey-text text-darken-4 truncate"><?= $fetch["nome"] ?> - <?=  ucfirst($fetch["sexo"]) ?></span></p></a>
                            <p class="">R$<?= $fetch["preco"] ?><br></p>
                            <div class="red-text"><hr></div>
                          <p><a href="produto.php?id=<?= $fetch["id"] ?>" class="orange-text text-darken-2 right">COMPRAR</a></p>
                        </div>
                      </div>
                </div>
        <?php }
            }else{
            ?>
            <h4 class="center">Nenhum produto foi encontrado</h4>
            <?php } ?>
        </div>
    </div>
</div>
<?php
  include 'footer.php';
?>
