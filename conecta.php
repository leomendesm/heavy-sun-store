<?php
session_start();
    if(isset($_SESSION['auto']) && $_SESSION['auto'] == 1){
    $con = new mysqli("localhost","root","","heavy");
   }else{
    $con = new mysqli("localhost","normaluser","","heavy");
   }
    
?>
