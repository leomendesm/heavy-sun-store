<?php
    include "conecta.php";
    $email=$_COOKIE['user'];
    $senha= $_COOKIE['senha'];
    $sql="select * from user where email='$email' and senha='$senha'";
    $run = $con->query($sql);
    $fetch = $run->fetch_assoc();
    $cont = $run->num_rows;
    if ($cont == 1){
        $_SESSION['id'] = $fetch["id"];
        $_SESSION['nome'] = $fetch["nome"];
        $_SESSION['email'] = $fetch["email"];
        $_SESSION['ender'] = $fetch["end"];
        $_SESSION['cep']= $fetch["cep"];
        $_SESSION['cpf']= $fetch["cpf"];
        $_SESSION['auto']= $fetch["auto"];
        header('location: index.php');
    }else{
        setcookie("user", "" , time());    
        setcookie("senha","" , time());
        header('location: index.php');
    }
?>
