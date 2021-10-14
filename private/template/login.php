<?php 

if (isset($_SESSION['logged_in'])) {
    header("location: ./index.php");
}

$msg = "";

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $hashed_pass = hash("SHA1", $password);

    if ($username != "" && $password != "") {
        try {
            $query = "select * from `accounts` where `email`=:username and `password`=:password";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindValue('password', $hashed_pass, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                echo "dw";
                $sql = "SELECT * FROM accounts where `email`= '$username'";
                $stm = $pdo->query($sql);

                $account = $stm->fetchAll();
                foreach($account as $account){
                    $_SESSION['role'] = $account['role'];
                    $_SESSION['categorie'] = $account['categorie'];
                }
                

                $_SESSION['logged_in'] = 1;
                $_SESSION['login_user'] = $username;

                header("location: ./index.php");
            } else {
                $msg = "Invalid username and password!";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    } else {
        $msg = "Both fields are required!";
    }
}
if (isset($msg)) {
    echo $msg;
}?>
<main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Inloggen</h2>
                    <p></p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" name="username" type="email" id="email"></div>
                    <div class="mb-3"><label class="form-label" for="password">Wachtwoord</label><input class="form-control" name="password" type="password" id="password"></div>
                    <div class="mb-3"></div><button class="btn btn-primary" name="submit" type="submit" style="transform: translate(179px);">Log In</button>
                </form>
            </div>
        </section>
    </main>