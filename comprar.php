<?php
include('head.php');
if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
$id_user = $_SESSION['id'];
$sql = 'select c.*,p.* from carrinho as c inner join produto as p on c.id_user = '.$id_user.' and c.id_prod = p.id';
$run = $con->query($sql);
$total = 0;
while($fetch = $run->fetch_assoc()){
    $total += $fetch['preco'];
}
if($total != 0){
$sql2 = "insert into compra(id_user,valor) values('$id_user', '$total')";
$run2 = $con->query($sql2);
$cod = $con->insert_id;
if($run2){?>
    <div class="container">
    <h4 class="center">Pedido nº<?=$cod?></h4>
    <ul class="collection">
<?php
    $run = $con->query($sql);
    while($fetch = $run->fetch_assoc()){
?>
    <li class="collection-item avatar">
      <img src="uploads/<?=$fetch['foto']?>" alt="" class="circle">
      <span class="title"><?=$fetch['nome']?> - <b><?=$fetch['tamanho']?></b></span>
      <p class="secondary-content black-text">R$<?=$fetch['preco']?></p>
    </li>
<?php
    }
    $total = str_replace("." , "" , $total);
    ?>
        </ul>
    <button id="customButton" class="waves-effect waves-light btn orange darken-3 right <?=($total == 0)? 'disabled':''?>">Pagar Agora</button>
    <h4 id="result" class="center green-text text-darken-2">Pagamento Concluído com Sucesso!</h4>
    <h4 id="error" class="center red-text text-darken-2">Pagamento Falhou!</h4>
</div>
    <?php
         }
}else{
    echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
}
include'footer.php';
?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    (function ($) {
    $(function () {
        $('#result').hide();
        $('#error').hide();
    var handler = StripeCheckout.configure({
    key: 'pk_test_gfrgeyKVhyLq9s5IyO2avboy',
    image: '/projeto/img/logo.png',
    locale: 'auto',
    currency: 'BRL',
    email:'<?=$_SESSION['email']?>',
    token: function(token) {
        $('#result').show();
        $('#customButton').addClass('disabled');
      // You can access the token ID with `token.id`.
      // Get the token ID to your server-side code for use.
    },
    close:function(){
    }
  });

  $('#customButton').on('click', function(e) {
    var idcompra = <?=$cod?>;
    $.ajax({
            url: "finalizarcompra.php",
            type: "post",
            data: "idcompra="+ idcompra,
            success: function (result) {
                console.log(result);
                if (result == 1) {

                }else {
                    $('#error').show();
                }
            }
        })
    handler.open({
      name: 'Heavy Sun Clothing',
      description: 'Heavy Sun Clothing',
      amount: <?=$total?>

    });
    e.preventDefault();

  });
  // Close Checkout on page navigation:
  $(window).on('popstate', function() {
    handler.close();
  });
    })
})(jQuery);
</script>
