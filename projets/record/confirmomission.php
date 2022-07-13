<?php
    require 'db.php';
    include 'fn.php';
    include 'header.php';
?>

<div class="container mt-5">
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading text-center text-danger">Mot de passe oublié ?</h4>
        <p class="text-success text-center">Pas de panique.</p>
        <hr>
        <p class="text-center">Merci de saisir l'adresse mail lié à au compte pour recevoir un lien par mail.<br>
            Ce lien vous permettra de changer de mot de passe.</p>
        </div>
    <div class="input-group mt-5 mx-3 mb-5">
        <span class="input-group-text bg-dark text-light" id="basic-addon3" title="C'est l'adresse mail">Identifiant</span>
        <input type="text" class="form-control rounded" id="login" name="login" placeholder="Veuillez saisir votre adresse mail on se charge d'envoyé un lien par mail pour le changer" value="" aria-describedby="basic-addon3" title="Entrez l'adresse mail, on se charge d'envoyé un lien par mail pour le changer" require>
    </div>
</div>


<?php
    include 'footer.php';
?>