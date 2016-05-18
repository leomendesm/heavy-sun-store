<?php
include('head.php');
$id = $_POST['estoquedelete'];
    $sql = "delete from estoque where id = $id";
    $run = $con->query($sql);
    echo "<center><h4>Produto excluído com sucesso!</h4></center>";
}else{
    echo "erro: ".mysqli_error($con);
}
include('footer.php');
?>
