<?php
    include "head.php";
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/home'</script>";
    }
    if (!empty($_POST)){
        $idprod = $_POST["idprod"];
        $p = $_POST["p"];
        $m = $_POST["m"];
        $g = $_POST["g"];
        $gg = $_POST["gg"];
        $query = "INSERT INTO estoque(id_prod, p, m, g, gg) VALUES ('$idprod','$p','$m','$g','$gg')";
        $run = $con->query($query);
        if($run){
            echo "Criado com sucesso!";
            exit;
        }else{
            echo "Falha ao criar produto";
        }
    }else{
     echo "qwe";
    }
    include'footer.php';
?>
