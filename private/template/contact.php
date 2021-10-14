<?php
if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $onderwerp = htmlspecialchars($_POST['onderwerp']);
    $bericht = htmlspecialchars($_POST['bericht']);

    $sql = "INSERT INTO contact (email, onderwerp, bericht) VALUES (?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$email, $onderwerp, $bericht]);
}
?>
 <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading"><label class="form-label" style="font-size: 27px;">Neem contact op</label>
                    <h2 class="text-info"></h2>
                    <p></p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3"><label class="form-label" for="subject">Onderwerp</label><input class="form-control" type="text" id="subject" name="onderwerp"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="message">Bericht</label><textarea class="form-control" id="message" name="bericht"></textarea></div>
                    <div class="mb-3"><button class="btn btn-primary" name="submit" type="submit">verstuur</button></div>
                </form>
            </div>
        </section>
    </main>