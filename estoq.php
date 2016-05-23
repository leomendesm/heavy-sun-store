<?php
    include 'conecta.php';
    $sql = "select * from produto";
    $run = $con->query($sql);
    while($fetch = $run->fetch_assoc()){
        $id_prod = $fetch['id'];
        $sql2= "insert into estoque(id_prod, p,m,g,gg) values ('$id_prod',10,10,10,10)";
        $run2 = $con->query($sql2);
        if($run2){
            echo " id : $id_prod <br>";
        }
    }
?>