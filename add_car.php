<?php
include('conecta.php');
session_start();
$id = $_SESSION['id'];
$prodid = $_POST['idprod'];
$tamanho = $_POST['tamanho'];
if(isset($id) && isset($prodid) && $tamanho != "null"){
    $sql = "insert into carrinho(id_user, id_prod) values($id, $prodid, '$tamanho')";
    $query = $con->query($sql);
    if($query){
        echo 1;
    }else{
        echo 2;
    }
}

?>
