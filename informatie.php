<?php
include("./secured/pdoconn.php");
session_start();

if(isset($_POST['submit'])){
    $titel = htmlspecialchars($_POST['onderwerp']);
    $description = htmlspecialchars($_POST['beschrijving']);
    $gemaakt = htmlspecialchars($_POST['geschreven_door']);
    $id = htmlspecialchars($_POST['id']);
    if($titel != "" && $description != ""){
        $sql = "INSERT INTO comments (titel, description, geplaatst_door, news_idnews) VALUES (?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$titel, $description, $gemaakt, $id]);
    
        $feedback = "Comment wordt eerst gecontrolleert door site eigenaar!";
    }else{
        $feedback = "Graag de verplichte velden invoeren!";
    }

   
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Nieuwsbrief - RIVORDELTA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styling/style_news.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <script src="https://use.fontawesome.com/2588abd5a6.js"></script>

</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="img-fluid" src="assets/img/tech/logo.svg"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="successverhalen.html" style="color: rgba(0,0,0,0.55);">successverhalen</a></li>
                    <li class="nav-item"><a class="nav-link active" href="informatie.php">nieuwsbrief</a></li>
                </ul>
                <?php
                        if(isset($_SESSION['logged_in'])){
                            echo '</div><a class="btn btn-primary" role="button" href="./dashboard/index.php">Dashboard</a>';
                        }else{
                            echo '</div><a class="btn btn-primary" role="button" href="login.php">login</a>';
                        }
                        
                ?>
            
        </div>
    </nav>
    <main class="page blog-post">
        <section class="clean-block clean-post dark">
            <div class="container">
                <div class="block-content">
                    <div class="post-image" style="background-image:url(&quot;assets/img/scenery/image3.jpg&quot;);"></div>
                    <div class="post-body">
                        <?php
                            /* Hier komen de nieuwsberichten */
                            $sql = "SELECT * FROM news";
                            $stm = $pdo->query($sql);

                            $nieuws_berichten = $stm->fetchAll();

                            foreach ($nieuws_berichten as $nieuws_bericht) {
                                $id = $nieuws_bericht['idnews'];

                                $timeStamp = $nieuws_bericht['datum'];
                                $timeStamp = date( "m/d/Y", strtotime($timeStamp));
                                echo "<h2 class='head_niewus'><b> " . $nieuws_bericht["headtext"] . "</h2></b><img height='600' width='1000' class='nieuws_plaatje'src='./dashboard/images/". $nieuws_bericht['picture_path'] ."'><p class='timestamp'>Datum: ".$timeStamp."</p><p class='nieuws_text'> " . $nieuws_bericht["newstext"] ."</p>" . "<hr/>";
                                // hier de comments a ZB
                                $sql = "SELECT * FROM comments WHERE news_idnews = $id AND accepted = 1";
                                $stm = $pdo->query($sql);
    
                                $comments_news = $stm->fetchAll();
    
                                foreach ($comments_news as $comments_news) {
                                    echo "Geplaatst door: <b>".$comments_news['titel'] . "</b><br>";
                                    echo $comments_news['description'];
                                    if($_SESSION['role'] == "1"){?>
                                    
                                        <br><br><a href="./dashboard/del_comment.php?id=<?php echo $comments_news['idcomments'];?>"><i class="fa fa-trash" style="font-size: 35px; color:red;" class="trashcan" aria-hidden="true"></i></i></a><?php
                                    }
                                    echo "<hr>";
                                }

                                ?> 
                                <div class="reacties">
                                    
                                        <form action="" method="POST">
                                            <input type="text" max=20 name="onderwerp" placeholder="Onderwerp*"><br>
                                            <textarea name="beschrijving" max="500" placeholder="Beschrijvijng*"></textarea><br>
                                            <input type="text" name="geschreven_door" placeholder="Geschreven door"><br>
                                            <input type="hidden" name="id" value="<?php echo $nieuws_bericht['idnews'];?>">
                                            <input type="submit" name="submit" value="Plaatsen">
                                        </form>
                                        <?php 
                                        if(isset($feedback)){
                                            echo $feedback;
                                        }
                                        ?>
                                        
                                </div>
                                <?php
                                echo '<hr style="height:3px;border:none;color:#333;background-color:#333;" />';

                                
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2021 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>