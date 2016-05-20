<?php
include('head.php');
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
$id = $_GET['id'];
$sql = "select * from carrinho where id_car = $id";
$run = $con->query($sql);
if($valor = $run->fetch_assoc()){
    if($_SESSION['id'] == $valor['id_user']){
    $sql2 = "delete from carrinho where id_car = $id";
    $run2 = $con->query($sql2);
     echo"<script>location.href = 'http://localhost/projeto/cart.php'</script>";
    }
}else{
    echo "erro: ".mysqli_error($con);
}
include('footer.php');
?>
