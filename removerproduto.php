<?php
include('head.php');
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/home'</script>";
    }
$id = $_POST['iddelete'];
$sql = "select * from produto where id = $id";
$run = $con->query($sql);
if($valor = $run->fetch_assoc()){
    $sql2 = "delete from produto where id = $id";
    $run2 = $con->query($sql2);
    unlink("uploads/".$valor['foto']);
    echo "<center><h4>Produto excluído com sucesso!</h4></center>";
}else{
    echo "erro: ".mysqli_error($con);
}
include('footer.php');
?>
