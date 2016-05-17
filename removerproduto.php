<?php
include('conecta.php');
include('')
$idprod = $_POST['proddelete'];
$sql = "select * from produto where id = $idprod";
$run = $con->query($sql);
if($valor = $run->fetch_assoc()){
    $sql2 = "delete from produto where id = $idprod";
    $run2 = $con->query($sql2);
    unlink("uploads/".$valor['foto']);
}else{
    echo "erro: ".mysqli_error($con);
}

?>