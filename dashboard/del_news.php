<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];

$sql = "DELETE FROM news WHERE idnews=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: ./all_news.php");
?>