<!DOCTYPE html>
<html lang="fr">

<?php
    include 'header.php';
?>

<body>
    <!--  pour remonter faire ../  -->
    <!-- PDO -> PHP Data Object -->

<div class="mt-5">
    <!-- <p>Un câble mini-jack écrira re, passera devant le casque qui est le c,<br>puis derrière le vinyle pour ressortir par le trou <br> et écrire rd, la prise est donc la barre du d.</p><br> -->
    <div class="d-flex">
        <!-- record ecrit avec unb fil jack le c est un casque et le o un vinyle le fil pas derrière le casque et ressot par le trou du vinyle pour donner une impressionde relief -->
        <!-- <img src="img/logo/casque.png" alt="casque" title="casque" class="rounded mx-auto d-block mb-8"> -->
        <img src="img/logo/vinyle.png" alt="disque" title="disque" class="rounded mx-auto d-block mb-8">
        <br><br><br><br>
    </div><!-- End of div logo -->

    <!-- 2 boutons -->
    <div class="text-center">
        <a href="authentification.php"><button type="button" class="btn btn-outline-dark btn-lg mx-5 mb-5">S'inscrire</button></a>
        <a href="authentification.php"><button type="button" class="btn btn-outline-dark btn-lg mx-5 mb-5">Se connecter</button></a>
    </div> <!-- End of div button -->
</div> <!-- End of container -->

<?php
    include 'footer.php';
?>