<?php
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
            $_SESSION['cep']= $fetch["cep"];
            $_SESSION['cpf']= $fetch["cpf"];
            $_SESSION['auto']= $fetch["auto"];
            if($_POST['remember'] == 'true'){
                setcookie('user', $email, time() + 3*24*60*60);
                setcookie('senha', $senha, time() + 3*24*60*60);
            }
            echo $_SESSION['auto'];
        }else{
           echo 'erro';
	   }
    }else{
           echo 'erro';
    }
?>
