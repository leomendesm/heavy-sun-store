<?php
include('conecta.php');
session_start();
$id = $_SESSION['id'];
$prodid = $_GET['prod'];

if(isset($id) && isset($prodid)){
    $sql = "insert into carrinho(id_user, id_prod) values ($id, $prodid)";
    $query = $con->query($sql);
    if($query){
        echo "nice";
    }else{
        echo "fez merda";
    }
}

?>
