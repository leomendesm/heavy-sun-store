<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $csenha = md5($_POST["csenha"]);
        $end = $_POST["end"];
        $cep = $_POST["cep"];
        $cpf = $_POST["cpf"];
        if($senha == $csenha){
            $senha = md5(md5($senha));
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $run = $con->query($sql);
            $cont = 0;
            $cont = $run->num_rows;
            if($cont == 0){
                $query = "INSERT INTO user(email, senha, cpf, nome, end, cep) VALUES ('$email','$senha','$cpf','$nome','$end','$cep')";
                $run2 = $con->query($query);
                echo 1;
                exit;
            }else{
                echo 2;
            }
        }else{
            echo 0;
        }
    }else{
    header("location: index.php");
    }
?>