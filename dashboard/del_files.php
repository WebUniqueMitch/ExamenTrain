<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];

$sql = "DELETE FROM files WHERE idfiles=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./all_news.php");
?>