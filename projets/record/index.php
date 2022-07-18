<?php
    require 'db.php';
    include 'fn.php';
    include 'header.php';

    // Initialisation des varables
    $usr = "";
    $passwd = "";
    $msg = "";
?>

<div class="container mt-5">
    <!-- <p>Un câble mini-jack écrira re, passera devant le casque qui est le c,<br>puis derrière le vinyle pour ressortir par le trou <br> et écrire rd, la prise est donc la barre du d.</p><br> -->
    <div class="d-flex">
        <!-- <img src="img/logo/casque.png" alt="casque" title="casque" class="rounded mx-auto d-block mb-8"> -->
        <img src="img/logo/record.png" alt="logo" title="logo" class="rounded mx-auto d-block mb-8">
        <br><br><br><br>
    </div><!-- End of div logo -->


    <form action="script_login.php" method="POST">
        <div class="container d-flex">
            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light" id="basic-addon3" title="C'est l'adresse mail">Identifiant</span>
                <input type="text" class="form-control rounded" id="login" name="login" placeholder="Veuillez saisir votre identifiant" value="<?= $usr ?>" aria-describedby="basic-addon3" title="C'est l'adresse mail" require>
                <p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "user") { echo "Identifiant incorrect"; } ?></p>
            </div>

            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light" id="basic-addon3" title="La sécurité, c'est essentiel">Mot de passe</span>
                <input type="password" class="form-control rounded" id="password" name="password" placeholder="Veuillez saisir votre mot de passe" value="<?= $passwd ?>" aria-describedby="basic-addon3" title="La sécutité, c'est essentiel" require>
                <p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "pwd") { echo "Mot de passe incorrect"; } ?></p>
            </div>
            <p class="text-danger"><?= $msg ?></p>
            
        </div> <!-- End of container -->

        <!-- 2 boutons -->
        <div class="text-center">
            <a href="registration.php"><button type="button" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="S'inscrir" title="Je m'inscris">S'inscrire</button></a>
            <button type="submit" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="Se connecter" title="Je me connecte" value="">Se connecter</button>
            <a href="confirmomission.php"><button type="button" class="btn btn-outline-primary btn-sm mx-5 mb-5" alt="Mot de passe oublié" title="Oh zut ! J'ai oublié mon mot de passe">Mot de passe oublié</button></a>
        </div> <!-- End of div button -->
    </form>
</div> <!-- End of container -->
<?php // msg de confimation d'inscrption
if (isset($_GET["register"]) && $_GET["register"] == "success") {?> <!-- register = param et success = valeur       si val = 1 je peux mettre true dans index -->
    <div class="alert alter-sm alert-success alert-dismissible fade show text-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        <strong>Bravo !</strong><br><br>
        C'est presque fini. Vous allez recevoir un email permettant de confirmer.<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
        </svg>
        <em> Pensez à vérifier les spams.</em>
        <button type="button" class="btn-close" data-bs-dismiss="close" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
    </div>


<?php
} // End of if isset

    include 'footer.php';
?>