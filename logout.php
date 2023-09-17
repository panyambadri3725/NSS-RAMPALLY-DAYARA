<?php
session_start();
//setcookie("gfg", "", time() - 3600);
unset($_SESSION["name"]);
unset($_SESSION["UserType"]);
header("Location:signin.php");
?>