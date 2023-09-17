<?php
session_start();
if(!isset($_SESSION["name"]) or !isset($_SESSION["UserType"]) or $_SESSION["UserType"]!="admin") {
  unset($_SESSION["name"]);
  unset($_SESSION["UserType"]);
  header("Location:index.php");
  }


//echo "<script>alert('Hello')</script>";
  $arr = $_POST['arr'];
  $cur = $_POST['curr'];
  if(!empty($arr) and !empty($cur) ){


    echo "<script>alert('$arr')</script>";
    echo "<script>alert('$cur')</script>";

  }


?>