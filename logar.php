<?php
    session_start();
    include "conecta.php";
    if(!empty($_POST)){
        $email=$_POST['email'];
        $senha= md5(md5(md5($_POST['senha'])));
        $sql="select * from user where email='$email' and senha='$senha'";
        $run = $con->query($sql);
        $fetch = $run->fetch_assoc();
        $cont = $run->num_rows;
        if ($cont == 1){
            $_SESSION['id'] = $fetch["id"];
            $_SESSION['nome'] = $fetch["nome"];
            $_SESSION['email'] = $fetch["email"];
            $_SESSION['ender'] = $fetch["end"];
            $_SESSION['cep ']= $fetch["cep"];
            $_SESSION['cpf ']= $fetch["cpf"];
            echo 1;
            }else{
           echo 2;
	   }
    }else{
           echo 3; 
    }
?>
