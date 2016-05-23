<?php
include('head.php');
    if(!isset($_SESSION['id'])){
       echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
$id = $_SESSION['id'];
$sql = 'select c.*,p.* from carrinho as c inner join produto as p on c.id_user = '.$id.' and c.id_prod = p.id';
$run = $con->query($sql);
$custo= 0;
?>
<h5 class="center">Carrinho de compras</h5>
<div class="container">
    <ul class="collection">
<?php
while($valor = $run->fetch_assoc()){ 
    $custo += $valor['preco']*$valor['quantia'];
        $id_prod = $valor['id_prod'];
        $estoq = "select * from estoque where id_prod = $id_prod";
        $run2 = $con->query($estoq);
        $fetch = $run2->fetch_assoc();
        $tam = $valor['tamanho'];
        $max = $fetch[$tam];
        ?>
<li class="collection-item avatar">
      <img src="uploads/<?=$valor['foto']?>" alt="" class="circle">
      <span class="title"><?=$valor['nome']?> - <b><?=$valor['tamanho']?></b></span>
      <form action="atualizacarrinho.php" method="post" name="mudarquantia<?= $id_prod ?>">
      <input type="hidden" value="<?=$valor['id_car']?>" name="id_carrinho">
      <input type="hidden" value="<?=$valor['tamanho']?>" name="tamanho">
       <br>
        <div class="input-field col s3 l1 right">
          <input value="<?=$valor['quantia']?>" name="quantia" id="quantia" type="number" min="1" class="validate" onchange="document.forms['mudarquantia<?= $id_prod ?>'].submit();">
          <label class="active" for="quantia">Quantidade</label>
        </div>
    </form>

     <div class="row">
      <p class="secondary-content black-text"> R$<?=$valor['preco']*$valor['quantia']?><br><a href='remover_car.php?id=<?=$valor['id_car']?>' class="material-icons orange-text right text-darken-2">close</a></p>
    </div>
    </li>    
<?php
} ?>
    </ul>
    <form action="comprar.php" method="post">
    <h5 class="right"><b>Valor total :</b> R$<?=$custo?></h5><br><br><br>
    <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right <?=($custo == 0)? 'disabled':''?>"><br><br><br>
    </form>
</div>
<?php 
    include('footer.php');
        if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
             echo"<script> Materialize.toast('O Estoque não possui a quantia desejada!', 3000);window.history.pushState('oi', 'Heavy Sun Clothing', '/projeto/cart.php');</script>";

        }
    }
?>
