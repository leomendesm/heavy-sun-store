<?php
include 'conecta.php';
$id_carrinho = $_POST['id_carrinho'];
$tam = $_POST['tamanho'];
$quantia = $_POST['quantia'];
$sql = "select * from carrinho where id_car = $id_carrinho";
$run = $con->query($sql);

if($valor = $run->fetch_assoc()){
    $id_prod = $valor['id_prod'];
    $sql2 = "select * from estoque where id_prod = $id_prod";
    $run2 = $con->query($sql2);
    if($fetch = $run2->fetch_assoc()){
        if($fetch[$tam] >= $quantia){
            $sql3 = "update carrinho set quantia = $quantia where id_car = $id_carrinho";
            $run3 = $con->query($sql3);
            if($run3){
                header('location: cart.php');
            }else{
                echo "revisa saporra";
            }
        }else{
            header('location: cart.php?erro=1');
        }
    }
}


?>
