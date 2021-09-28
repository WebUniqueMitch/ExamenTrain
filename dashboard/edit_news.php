<?php
$id = $_GET['id'];

session_start();
include("../secured/pdoconn.php");

if (!isset($_SESSION['logged_in'])) {
    header("location: ../index.php");
}

if (isset($_POST['submit'])) {
    $news_head = htmlspecialchars($_POST['headtext']);
    $news_body = htmlspecialchars($_POST['bodytext']);

    $errors = array();
    
        $sql = "INSERT INTO news (headtext, newstext) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$news_head, $news_body]);
        header("./all_news.php");
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Nieuwsbrief - RIVORDELTA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="bestanden.php"><i class="fas fa-user"></i><span>Bestanden</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="gebruikers.php"><i class="fa fa-files-o"></i><span>Gebruikers</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fa fa-files-o"></i><span>RIVORDELTA</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="all_news.php"><i class="fa fa-files-o"></i><span>Nieuwsbrief</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['login_user']; ?></span><img class="border rounded-circle img-profile" src="assets/img/abstract-user-flat-4.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="./logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Nieuwsbrief item aanpassen</h3>
                    <div class="container-fluid">
                        <div class="card shadow">
                            <div class="card-body">
                            <a href="./all_news.php" class="button">Terug</a>
                                <div class="row">
                                    <div class="col-md-6 text-nowrap">
                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                    </div>
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <!-- 
                                        nieuws toevoegen
                                     -->
                                    <?php
                                    $sql = "SELECT * FROM news WHERE idnews=$id";
                                    $stm = $pdo->query($sql);

                                    $nieuws_berichten = $stm->fetchAll();

                                    foreach ($nieuws_berichten as $nieuws_bericht) {
                                    ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label for="headtext">Titel: </label>
                                            <input type="text" value='<?php echo $nieuws_bericht["headtext"];?>'name="headtext" placeholder="">
                                            <label for="bodytext">Text: </label>
                                            <textarea name="bodytext"><?php echo $nieuws_bericht["newstext"];?></textarea>
                                            <label for="plaatje">Plaatje: </label>

                                            <input type="submit" name="submit" value="Aanpassen">
                                        </form><?php

                                            }
                                                ?>


                                </div>
                            </div>
                            <div class="card shadow mb-5"></div>
                        </div>
                    </div>

                    <footer class="bg-white sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>Copyright © RIVORDELTA 2021</span></div>
                        </div>
                    </footer>
                </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            </div>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/theme.js"></script>
</body>

</html>