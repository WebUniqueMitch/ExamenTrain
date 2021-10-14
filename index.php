<?php
include("private/include/_nav.php");
$page = $_GET['page'];
if(!isset($page)){
    $page = "";
}
switch ($page) {
    case "home":
        include("private/template/index1.php");
        break;
    case "informatie":
        include("private/template/informatie.php");
        break;
    case "successverhalen":
        include("private/template/successverhalen.php");
        break;
    case "contact":
        include("private/template/contact.php");
        break;
    case "login":
        include("private/template/login.php");
        break;
    default:
        include("private/template/index1.php");
        break;

    }
include("private/include/_footer.php");
?>