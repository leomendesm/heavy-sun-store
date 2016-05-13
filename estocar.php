<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $idprod = $_POST["idprod"];
        $sexo = $_POST["sexo"];
        $quantia = $_POST["quantia"];
        $tamanho = $_POST["tamanho"];
        $query = "INSERT INTO estoque(id_prod, tamanho, quantia, Sexo) VALUES ('$idprod','$tamanho','$quantia','$sexo')";
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
?>