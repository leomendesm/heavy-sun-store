<?php
  include('conecta.php');
  if(isset($_SESSION['id']) && isset($_SESSION['auto']) && $_SESSION['auto'] == 1){
    $sql = "call desconto();";
    $run = $con->query($sql);
    if($run){
      header('location: home');
    }
  }else{
    //header('location: home');
  }
?>
