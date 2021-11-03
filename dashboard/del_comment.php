<?php
include("../secured/pdoconn.php");


$id = $_GET['id'];

$sql = "DELETE FROM comments WHERE idcomments=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);
if($_GET['page'] == '1'){
    header("location: ../index.php?page=informatie");
}else{
    header("location: ./comments.php");
}
?>