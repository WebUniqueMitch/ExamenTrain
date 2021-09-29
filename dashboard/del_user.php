<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];

$sql = "DELETE FROM accounts WHERE idaccounts=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./gebruikers.php");
?>