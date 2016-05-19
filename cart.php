<?php
include('head.php');
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
    $custo += $valor['preco'];
        ?>
<li class="collection-item avatar">
      <img src="uploads/<?=$valor['foto']?>" alt="" class="circle">
      <span class="title"><?=$valor['nome']?> - <b><?=$valor['tamanho']?></b></span>
      <p class="secondary-content black-text">R$<?=$valor['preco']?><br><a href='remover_car.php?id=<?=$valor['id_car']?>' class="material-icons orange-text right text-darken-2">close</a></p>
    </li>    
<?php
} ?>
    </ul>
    <h5 class="right"><b>Valor total :</b> R$<?=$custo?></h5><br><br><br>
    <input type="submit" value="Confirmar" class="waves-effect waves-light btn orange darken-3 right <?=($valor == 0)? 'disabled':''?>"><br><br><br>
</div>
<?php 
    include('footer.php');
?>
