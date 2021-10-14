<?php
session_start();
if($_SESSION['role'] == "1" || $_SESSION['role'] == "2"){
    header("location: ../index.php");
}else if($_SESSION['role'] == "3"){
    header("location: ./bestanden.php");
}
?>
