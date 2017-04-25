<?php
session_start();
if(isset($_SESSION['autenticado']))
unset($_SESSION['autenticado']);
header("location:index.php");
?>