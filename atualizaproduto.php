<?php
    include "head.php";
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $descri = $_POST["desc"];
        $preco = $_POST["valor"];
        $fotoantiga = $_POST["fotoantiga"];
        $id = $_POST["id"];
        $sexo = $_POST["sexo"];
        $cat = $_POST["categoria"];
        if(!empty($_FILES["foto"]["name"])){
            if ($_FILES["foto"]["error"]==0) {
                $ext = substr($_FILES["foto"]["name"], strpos(strrev($_FILES["foto"]["name"]),".")*-1);
                $foto = md5(time().$_FILES["foto"]["name"]).".".$ext;
                move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/".$foto);
                if($fotoantiga != 'nouser.png'){
                    unlink('uploads/'.$fotoantiga);
                }
            }
        }else{ 
            $foto = $fotoantiga;
        }
        $query = "update produto set nome = '$nome', descri = '$descri', preco = '$preco', foto = '$foto', sexo = '$sexo', categoria = '$cat' where id = $id";
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
