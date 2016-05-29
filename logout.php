<?php
session_start();
session_destroy();
setcookie('user', $email, time());
setcookie('senha', $senha, time());
header("location: home");
?>
