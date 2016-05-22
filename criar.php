<?php
    include"head.php";
    if(!isset($_SESSION['id'])){
        echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
    if (!empty($_POST)){
        $nome = $_POST["nome"];
        $descri = $_POST["desc"];
        $preco = $_POST["valor"];
        $sexo = $_POST["sexo"];
        $cat = $_POST["categoria"];
        if ($_FILES["foto"]["error"]==0) {
            $ext = substr($_FILES["foto"]["name"], strpos(strrev($_FILES["foto"]["name"]),".")*-1);
            $foto = md5(time().$_FILES["foto"]["name"]).".".$ext;
            move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/".$foto);
        } else {
            $foto ="nouser.png";
        }
        $query = "INSERT INTO produto(nome, descri, preco, foto, sexo, categoria) VALUES ('$nome','$descri','$preco','$foto', '$sexo','$cat')";
        $run = $con->query($query);
        if($run){
            echo "Criado com sucesso!";
        }else{
            echo "Falha ao criar produto";
        }
    }else{
     echo"<script>location.href = 'http://localhost/projeto/index.php'</script>";
    }
    include"footer.php";
?>
