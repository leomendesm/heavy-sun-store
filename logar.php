<?php
    include "conecta.php";
    if(!empty($_POST)){
        $email=$_POST['email'];
        $senha=$_POST['senha'];
        $sql="select * from user where email='".$email."' and senha='".md5(md5(md5($senha)))."'";
        $run = $mysql->query($sql);
        $fetch = $run->fetch_assoc();
        $cont = $run->num_rows;
        if ($cont == 1){
             echo "Cadastrado com sucesso";
            if(!isset($_SESSION)){
            session_start();		
            $_SESSION['nome'] = $fetch["nome"];
            $_SESSION['email'] = $fetch["email"];
            $_SESSION['ender'] = $fetch["end"];
            $_SESSION['cep ']= $fetch["cep"];
            $_SESSION['cpf ']= $fetch["cpf"];
            }
            exit;
        }
        else{
           echo "Usuário ou senha incorretos!";
	   }
    }
?>