<?php
include("../secured/pdoconn.php");

$id = $_GET['id'];
$type = $_GET['type'];

switch($type){
    case "file":
        $sql = "DELETE FROM files WHERE idfile=?";
        break;
    case "accounts":
        $sql = "DELETE FROM accounts WHERE idaccounts=?";
        break;
    case "news":
        $sql = "DELETE FROM news WHERE idnews=?";
        break;
    case "comment":
        $sql = "DELETE FROM comments WHERE idcomments=?";
        break;
    

}
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);
?>