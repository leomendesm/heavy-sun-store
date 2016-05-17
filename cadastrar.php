<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $csenha = md5($_POST["csenha"]);
        $ender = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cpf = $_POST["cpf"];
        if($senha == $csenha){
            $pass = md5(md5($pass));
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $run = $con->query($sql);
            $cont = $ran->num_rows;
            if($cont == 0){
                $query = "INSERT INTO user(email, senha, cpf, nome, end, cep) VALUES ('$email','$pass','$cpf','$nome','$end','$cep')";
                $run2 = $con->query($query);
                echo "Cadastrado com sucesso!";
                exit;
            }else{
                echo "E-mail em uso!";
            }
        }else{
            echo "As senhas não conferem!";
        }
    }else{
    header("location: index.php");
    }
?>