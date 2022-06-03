<!DOCTYPE html>
<html lang="fr">

<?php
    include 'header.php';
?>

<body>
    <!--  pour remonter faire ../  -->
    <!-- PDO -> PHP Data Object -->

<div class="container mt-5">
    <p>Un câble mini-jack écrira re, passera devant le casque qui est le c,<br> puis derrière le vinyle pour ressortir par le trou <br> et écrire rd, la prise est donc la barre du d.</p><hr>
    <div class="d-flex">
        <!-- record ecrit avec unb fil jack le c est un casque et le o un vinyle le fil pas derrière le casque et ressot par le trou du vinyle pour donner une impressionde relief -->
        <img src="logo/casque" alt="casque" title="casque" class="rounded mx-auto d-block">
        <img src="logo/vinyle.png" alt="disque" title="disque" class="rounded mx-auto d-block">
        <br>
        <hr>
    </div><!-- End of div logo -->
<br><br><br><br>

    <!-- 2 boutons -->
    <div class="text-center">
        <a href="authentification.php"><button type="button" class="btn btn-outline-dark btn-lg mx-5 mb-3">S'inscrire</button></a>
        <a href="authentification.php"><button type="button" class="btn btn-outline-dark btn-lg mx-5 mb-3">Se connecter</button></a>
    </div> <!-- End of div button -->
</div> <!-- End of container -->

<?php
    include 'footer.php';
?>