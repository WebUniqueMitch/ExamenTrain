<main class="page landing-page">
        <section class="clean-block clean-hero" style="color: rgba(9, 162, 255, 0.85);background: url(&quot;assets/img/tech/Untitled-1.png&quot;) center / cover;">
            <div class="text">
                <h2>ROC DELTA</h2>
                <p>ben jij 18 jaar of ouder maar heb je nog geen diploma kunnen halan maar zou jij dit wel willen? Dan is dit de plek voor jou!</p><button class="btn btn-outline-light btn-lg" type="button" style="background: #ffffff;"><a href="?page=informatie" class="underline_wooosh" style="background: #ffffff;">Meer weten</a></button>
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
                <a href="./informatie.php">
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                       <?php
                       $i = 0;
                       foreach ($images as $img) {
                echo $img['picture_path'];
                           ?>
                       
                       <div class="carousel-item 
                       <?php if($i==0){
                           echo " active";
                       } ?> 
                       "><img class="img-thumbnail img-fluid w-100 d-block border-primary" src="<?php echo './dashboard/images/'.$img['picture_path']; ?>" alt="Slide Image" style="transform: scale(1);"></div>
                        <!-- <div class="carousel-item"><img class="w-100 d-block" src="assets/img/tech/Untitled-1.png" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block border rounded-0 border-dark" src="assets/img/scenery/rivor_logo_roc_rgb_kleur-01-e1555594246150.png" alt="Slide Image" style="border-width: 56px;border-style: solid;"></div>
                    -->
                    <?php
                      $i=1; }
                       ?>
                    </div>
                    </a>
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