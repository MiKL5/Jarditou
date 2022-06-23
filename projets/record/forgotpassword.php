<?php
    // require 'db.php';
    // include 'fn.php';
    include 'header.php';
?>
<div class="container mt-5">
    <!-- <p>Un câble mini-jack écrira re, passera devant le casque qui est le c,<br>puis derrière le vinyle pour ressortir par le trou <br> et écrire rd, la prise est donc la barre du d.</p><br> -->
    <div class="d-flex">
        <!-- record ecrit avec un câble jack le c est un casque et le o un vinyle le fil pas derrière le casque et ressot par le trou du vinyle pour donner une impressionde relief -->
        <!-- <img src="img/logo/casque.png" alt="casque" title="casque" class="rounded mx-auto d-block mb-8"> -->
    </div><!-- End of div logo -->


    <form action="script_login.php" method="POST">
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading text-center">Voici le formulaire de changemnt de mot de passe.</h4>
            <br>
            <p class="text-center">Pour votre sécurité, veuillez saisir un mot de passe sûre.</p>
            <hr>
            <p class="mb-0">Un mot de passe sûre doit contenir :<br>
            - au moins dix caractères ;<br>
            - une letre majuscule ;<br>
            - un chiffre ;<br>
            - et un caractère spécial.</p>
        </div>
        <p class="text-center mt-5 mb-5 text-danger"></p>
        <div class="container d-flex">
            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light" id="basic-addon3"  title="Nouveau mote de passe">Nouveau</span>
                <input type="text" class="form-control" id="password" name="password" placeholder="Veuillez saisir le nouveau mot de passe" value="" aria-describedby="basic-addon3"  title="Saisissez le nouveau mot de passe" require>
                <p class="comments"> </p>
            </div>
            <div class="input-group mt-5 mx-3 mb-5">
                <span class="input-group-text bg-dark text-light rounded" id="basic-addon3" title="Comfirmer le mot de passe">Confirmer</span>
                <input type="password" class="form-control rounded" id="password" name="password" placeholder="Veuillez confimer le mot de passe"  title="Ressaisissez le mot de passe" value="" aria-describedby="basic-addon3" require>
                <p class="comments"> </p>
            </div>
            <p class="text-danger"> </p>
            <button type="submit" class="btn btn-outline-success btn-sm mt-5 mb-5 mx-5" value="">Changer</button>
        </div> <!-- End of container -->
    </form>
</div> <!-- end of container -->

<?php
    include 'footer.php'
?>