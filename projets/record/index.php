<!DOCTYPE html>
<html lang="fr">

<?php
    include 'header.php';
    include 'db.php';
    include 'fn.php';

    // Initialisation des varables
    $usr = "";
    $passwd = "";
    $msg = "";
    $usrerror = "";
    $passwderror = "";

    // INSCRIPTION
    // $connexion = ConnexionBase();
    // $req = $connexion->prepare("select * from record where id = :id and name = :name");
    // $req->bindValue(':id', $id);
    // $req->bindValue(':name', $name);
    // $req->execute();

    // $result = $req->fetch(PDO::FETCH_ASSOC);

    // print_r($result);

?>

<body>
    <!--  pour remonter faire ../  -->
    <!-- PDO -> PHP Data Object -->

<div class="mt-5">
    <!-- <p>Un câble mini-jack écrira re, passera devant le casque qui est le c,<br>puis derrière le vinyle pour ressortir par le trou <br> et écrire rd, la prise est donc la barre du d.</p><br> -->
    <div class="d-flex">
        <!-- record ecrit avec un câble jack le c est un casque et le o un vinyle le fil pas derrière le casque et ressot par le trou du vinyle pour donner une impressionde relief -->
        <!-- <img src="img/logo/casque.png" alt="casque" title="casque" class="rounded mx-auto d-block mb-8"> -->
        <img src="img/logo/vinyle.png" alt="disque" title="disque" class="rounded mx-auto d-block mb-8">
        <br><br><br><br>
    </div><!-- End of div logo -->


    <form action="script_login.php" method="POST">
        <div class="container d-flex">
            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light" id="basic-addon3">Identifiant</span>
                <input type="text" class="form-control rounded" id="basic-url" name="login" placeholder="Veuillez saisir votre identifiant" value="<?= $usr ?>" aria-describedby="basic-addon3" require>
                <p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "user") { echo "Identifiant incorrect"; } ?></p>
            </div>

            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light" id="basic-addon3">Mot de passe</span>
                <input type="password" class="form-control rounded" id="basic-url" name="password" placeholder="Veuillez saisir votre mot de passe"value="<?= $passwd ?>" aria-describedby="basic-addon3" require>
                <p class="comments"><?php if (isset($_GET["err"]) && $_GET["err"] == "pwd") { echo "Mot de passe incorrect"; } ?></p>
            </div>
            <p class="text-danger"><?= $msg ?></p>
            
        </div> <!-- End of container -->

        <!-- 2 boutons -->
        <div class="text-center">
            <!-- <a href="disc.php"><button type="submit" class="btn btn-outline-primary btn-lg mx-5 mb-5">S'inscrire</button></a> -->
            <button type="submit" class="btn btn-outline-primary btn-sm mx-5 mb-5" value="">Se connecter / S'inscrire</button>
            <!-- <button type="submit" class="btn btn-outline-primary btn-sm mx-5 mb-5">Déconnexion</button> -->
        </div> <!-- End of div button -->

    </form>
</div> <!-- End of container -->

<?php
    include 'footer.php';
?>

<!--
    SI LE LOGIN ET LE MOT DE PASSE SONT CORRECTS ALORS INITIALISER UNE VARIABLE DE SESSION AUTH AVEC LA VALEUR OK
    SINON LA VARIABLE DE SESSION AUTH EST DÉTRUITE
    SI LA VALEUR EST OK À AUTH ALLER À DISC.PHP
    SINON ALLSER À INDEX.PHP
-->