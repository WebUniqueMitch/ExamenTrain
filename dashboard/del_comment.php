<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];

$sql = "DELETE FROM comments WHERE idcomments=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./comments.php");
?>