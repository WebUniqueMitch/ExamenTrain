<?php
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
                                    if(!isset($_SESSTION) && $_SESSION['role'] == "1"){?>
                                        <br><br><a href="./dashboard/del_comment.php?id=<?php echo $comments_news['idcomments'];?>&page=1"><i class="fa fa-trash" style="font-size: 35px; color:red;" class="trashcan" aria-hidden="true"></i>Delete</i></a><?php
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