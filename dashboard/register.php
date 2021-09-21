<?php 

include("../secured/pdoconn.php");

if(isset($_POST['submit'])){
    // Define variables
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);
    
    // Password hashing
    $hashed_pass = hash("SHA1", $password);

    if($role = "1" || $role = "2" || $role = "3"){
        
        // create query and run it
        $sql = "INSERT INTO accounts (email, password, role) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$username, $hashed_pass, $role]);
        echo "Gebruiker successvol aangemaakt.";
    }else{
        $err = "Gebruik een role die geldig is.";
        echo $err;
    }
}


?>
<form action="" method="POST">
    <input type="text" name="username" placeholder="gebruikersnaam">
    <input type="text" name="password" placeholder="wachtwoord">
    <label for="role">Rol:</label>
    <select name="role">
        <option value="1">admin</option>
        <option value="2">projectleider</option>
        <option value="3">vriend</option>
    </select>

    <input type="submit" name="submit" value="submit">
</form>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>

<body class="bg-gradient-primary">
    <div class="container" style="width: 846px;">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5" style="transform: translate(167px);">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Account aanmaken</h4>
                            </div>
                            <form class="user">
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email adres" name="email"></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Wachtwoord" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Herhaal wachtwoord" name="password_repeat"></div>
                                </div>
                                <div class="dropdown" style="transform: translate(115px);margin: 0;width: 148.5px;margin-bottom: 9px;"><button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Dropdown </button>
                                    <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Aanmaken</button>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>