<?php
    include "head.php";
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
    if (!empty($_POST)){
        $idestoque = $_POST["idestoque"];
        $p = $_POST["p"];
        $m = $_POST["m"];
        $g = $_POST["g"];
        $gg = $_POST["gg"];
        $query = "update estoque set p = $p, m = $m, g = $g, gg = $gg where id=$idestoque";
        $run = $con->query($query);
        if($run){
            echo "Atualizado Com sucesso!";
            exit;
        }else{
            echo "Falha ao atualizar estoque";
        }
    }else{
     header('location: index.php');
    }
    include "footer.php";
?>
