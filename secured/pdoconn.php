<?php
$user = "root";
$pass = "";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=examentraining', $user, $pass);
} catch (PDOException $e) {
    print "Error!: Database connection error, please contact the site administrator. (admin@admin.com)<br/>";
    die();
}
?>