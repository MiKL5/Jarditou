<?php
    include 'header.php';
    include 'db.php';
    include 'fn.php';

    $usrerror = "";
    $passwderror = "";
?>

<body>
    
    <div class="container">
        <h2 class="mt-3 mb-5">Connexion</h2>
        <div class="row">
            <div class="container d-flex col-12">
                <div class="d-inline-block">
                    <form action="script_login.php" method="$_POST">
                        <div class="input-group col-5">
                            <span class="input-group-text bg-dark text-light" id="login" name="login" require>Identifiant</span>
                            <input type="text" class="form-control" name="login" value="" placeholder="Saisissez votre identifiant"><br>
                            <label class="comments"><?= $usrerror ?></label>
                        </div>
                        <div class="input-group col-5 mt-3 mb-5">
                            <span class="input-group-text bg-dark text-light" id="password" require>Mot de passe</span>
                            <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Enter the password">
                            <p class="comments"><?= $passwderror ?></p>
                        </div>
                        <!-- Inscription -->
                        <a href="script_login.php"><button type="button" name="inscription" class=" btn btn-outline-success btn-sm mx-0 mb-4">Inscription</button></a>
                        <!-- Connexion -->
                        <button type="submit" name="connexion" class=" btn btn-success btn-sm mx-2 mb-4">Connexion</button>
                        <!-- Forgot passwd -->
                        <a href="script_login.php"><button type="button" name="forgotpasswd" class="btn btn-outline-danger btn-sm mx-5 mb-4">Mot de passe oublié</button></a>
                    </form>
                </div> <!--- End of col-12-->
            </div> <!-- End of container d-flex -->
        </div> <!-- End of row -->
    </div> <!-- End of container -->

<?php
    include 'footer.php';
?>