<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];
        $query = "INSERT INTO contato(nome, email, mensagem) VALUES ('$nome','$email','$mensagem')";
        $run = $con->query($query);
        if($run){
            echo "Contatado com sucesso!";
            exit;
        }else{
            echo "Falha ao contatar";
        }
    }else{
    header("location: index.php");
    }
?>