<?php
session_start();
include("secured/pdoconn.php");

$sql = "SELECT * FROM news ORDER BY datum LIMIT 3 ";
$stm = $pdo->query($sql);
$images = $stm->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - RIVORDELTA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="./styling/style_home.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="img-fluid" src="assets/img/tech/logo.svg"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="?page=successverhalen" style="color: rgba(0,0,0,0.55);">successverhalen</a></li>
                    <li class="nav-item"><a class="nav-link" href="?page=contact" style="color: rgba(0,0,0,0.55);">contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="?page=informatie">nieuwsbrief</a></li>
                </ul>
                <?php
                if (isset($_SESSION['logged_in'])) {
                    echo '</div><a class="btn btn-primary" role="button" href="./dashboard/index.php">Dashboard</a>';
                } else {
                    echo '</div><a class="btn btn-primary" role="button" href="?page=login">login</a>';
                }

                ?>

            </div>
    </nav>