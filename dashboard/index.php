<?php
session_start();
if(isset($_SESSION['logged_in']) && ($_SESSION['role'] == "1" || $_SESSION['role'] == "2")){
    header("location: ./bestanden.php");
}else{
    header("location: ./vrienden/index.php");
}