<?php
include('head.php');
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
$id = $_POST['estoquedelete'];
    $sql = "delete from estoque where id = $id";
    $run = $con->query($sql);
    echo "<center><h4>Produto excluído com sucesso!</h4></center>";
}else{
    echo "erro: ".mysqli_error($con);
}
include('footer.php');
?>
