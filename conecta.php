<?php
session_start();
    if(isset($_SESSION['auto']) && $_SESSION['auto'] == 1){
    $con = new mysqli("localhost","admin","JTx45S2cCBzj8BUj","heavy");
   }else{
    $con = new mysqli("localhost","normal","LxduSEYHdusZaHqN","heavy");
   }
    
?>
