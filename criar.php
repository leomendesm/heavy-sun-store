<?php
    session_start();
    include "conecta.php";
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $descri = $_POST["desc"];
        $preco = $_POST["valor"];
        if ($_FILES["foto"]["error"]==0) {
            $ext = substr($_FILES["foto"]["name"], strpos(strrev($_FILES["foto"]["name"]),".")*-1);
            $foto = md5(time().$_FILES["foto"]["name"]).".".$ext;
            move_uploaded_file($_FILES["foto"]["tmp_name"], "imagens/".$foto);
        } else { 
            $foto ="nouser.png";
        }
        $query = "INSERT INTO produto(nome, descri, preco, foto) VALUES ('$nome','$descri','$preco','$foto')";
        $run = $con->query($query);
        if($run){
            echo "Criado com sucesso!";
            exit;
        }else{
            echo "Falha ao criar produto";
        }
    }else{
     echo "qwe";
    }
?>