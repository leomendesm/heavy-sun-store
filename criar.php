<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $descri = $_POST["descri"];
        $preco = $_POST["preco"];
        $query = "INSERT INTO produto(nome, descri, preco) VALUES ('$nome','$descri','$preco')";
        $run = $con->query($query);
        if($run){
            echo "Criado com sucesso!";
            exit;
        }else{
            echo "Falha ao criar produto";
        }
    }else{
    header("location: index.php");
    }
?>