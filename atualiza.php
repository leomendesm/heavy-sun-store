<?php
    include "conecta.php";
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/home'</script>";
    }
    $id = $_SESSION['id'];
    if (!empty($_POST) && $id != ''){
        $nome = $_POST["anome"];
        $email = $_POST["aemail"];
        $senha = $_POST["asenha"];
        $csenha = $_POST["acsenha"];
        $end = $_POST["aend"];
        $cep = $_POST["acep"];
        $cpf = $_POST["acpf"];
        if($senha == $csenha && $senha != null && $csenha != null){
            $senha = md5(md5(md5($_POST['asenha'])));
            $query = "UPDATE user SET email = '$email', senha = '$senha', cpf = '$cpf', nome = '$nome', end = '$end', cep = '$cep'  WHERE id = $id";
            $run2 = $con->query($query);
            if($run2){header("location: home");}
        }else{
            $query = "UPDATE user SET email = '$email', cpf = '$cpf', nome = '$nome', end = '$end', cep = '$cep' WHERE id = $id";
            $run2 = $con->query($query);
            if($run2){header("location: home");}
        }
    }else{
        header("location: home");
    }
?>
