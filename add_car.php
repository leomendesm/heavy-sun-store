<?php
include('conecta.php');
if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/home'</script>";
    }
$id = $_SESSION['id'];
$prodid = $_POST['idprod'];
$tamanho = $_POST['tamanho'];
if(isset($id) && isset($prodid) && $tamanho != "null"){
    $sql = "insert into carrinho(id_user, id_prod, tamanho) values($id, $prodid, '$tamanho')";
    $query = $con->query($sql);
    if($query){
        echo 1;
    }
    else{
        echo 2;
    }
}else{
	echo 3;
}

?>
