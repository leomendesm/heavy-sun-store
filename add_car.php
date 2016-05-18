<?php
include('conecta.php');
session_start();
$id = $_SESSION['id'];
$prodid = $_POST['idprod'];
$tamanho = $_POST['tamanho'];
if(isset($id) && isset($prodid) && $tamanho != "null"){
    $sql = "insert into carrinho(id_user, id_prod, tamanho) values($id, $prodid, '$tamanho')";
    $query = $con->query($sql);
        echo 1;
}

?>
