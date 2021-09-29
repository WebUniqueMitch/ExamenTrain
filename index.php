<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - RIVORDELTA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="./styling/style_home.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><img class="img-fluid" src="assets/img/tech/logo.svg"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="successverhalen.html" style="color: rgba(0,0,0,0.55);">successverhalen</a></li>
                    <li class="nav-item"><a class="nav-link" href="informatie.php">nieuwsbrief</a></li>
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
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="color: rgba(9, 162, 255, 0.85);background: url(&quot;assets/img/tech/Untitled-1.png&quot;) center / cover;">
            <div class="text">
                <h2>ROC DELTA</h2>
                <p>ben jij 18 jaar of ouder maar heb je nog geen diploma kunnen halan maar zou jij dit wel willen? Dan is dit de plek voor jou!</p><button class="btn btn-outline-light btn-lg" type="button" style="background: #ffffff;"><a href="informatie.html" class="underline_wooosh" style="background: #ffffff;">Meer weten</a></button>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">ROC RIVOR</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="assets/img/scenery/roc-rivor.jpg"></div>
                    <div class="col-md-6">
                        <h3>Bachstraat 1, 4003 KZ Tiel&nbsp;</h3>
                        <div class="getting-started-info">
                            <p>TEXT TEXT TEXT TEXT HIER HIER HIER</p>
                        </div><button class="btn btn-outline-primary btn-lg" type="button">Website</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Het laatste nieuws</h2>
                    <p>Hieronder vindt u het laatste nieuws</p>
                </div>
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="img-thumbnail img-fluid w-100 d-block border-primary" src="assets/img/scenery/rivor_logo_roc_rgb_kleur-01-e1555594246150.png" alt="Slide Image" style="transform: scale(1);"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/tech/Untitled-1.png" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block border rounded-0 border-dark" src="assets/img/scenery/rivor_logo_roc_rgb_kleur-01-e1555594246150.png" alt="Slide Image" style="border-width: 56px;border-style: solid;"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                    </ol>
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
            <p>© 2021 - RIVOR DELTA</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>