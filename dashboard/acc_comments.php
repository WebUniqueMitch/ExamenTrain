<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];

$sql = "UPDATE comments SET accepted = 1 WHERE idcomments=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./comments.php");
?>