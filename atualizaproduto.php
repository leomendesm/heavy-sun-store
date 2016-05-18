<?php
    include "head.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $descri = $_POST["desc"];
        $preco = $_POST["valor"];
        $fotoantiga = $_POST["fotoantiga"];
        $id = $_POST["id"];
        if ($_FILES["foto"]["error"]==0) {
            $ext = substr($_FILES["foto"]["name"], strpos(strrev($_FILES["foto"]["name"]),".")*-1);
            $foto = md5(time().$_FILES["foto"]["name"]).".".$ext;
            move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/".$foto);
            unlink('uploads/'.$fotoantiga);
        } else {
            $foto ="noprod.png";
        }
        $query = "update produto set nome = '$nome', descri = '$descri', preco = '$preco', foto = '$foto' where id = $id";
        $run = $con->query($query);
        if($run){
            echo "Atualizado com sucesso!";
            exit;
        }else{
            echo "Falha ao atualizar produto";
        }
    }else{
     header('location: index.php');
    }
    include('footer.php');
?>
