<?php
include('conecta.php');
if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
if(!empty($_POST)){
$id = $_POST['idcompra'];
$sql = "update compra set aprovado = 1 where id = $id";
$run = $con->query($sql);
echo 1;
exit;
}else{
    header('location: index.php');
}
?>
