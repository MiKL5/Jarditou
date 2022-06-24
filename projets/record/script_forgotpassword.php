<!-- 

1.  Mot de passe oublié : demander à l'utilisateur de re-saisir l'adresse mail de son compte et demander une re-génération (bouton) FAIT


2.  Générer un token qui va être stocké en BDD sur l'enregistrement de la ligne de l'utilisateur

3.  Préparer un lien pour le mail : page forgotpassword.php avec le token en paramètre ($_GET)

    + envoyer le lien par mail à l'utilisateur


4.  Sur la page forgotpassword.php, prévoir de pouvoir vérifier l'existence d'un paramètre contenant le token à récupérer

5.  Vérifier dans la BDD que ce token existe et retrouver à quel compte il est destiné

        - si le token existe, on permet à l'utilisateur de changer son password et on le met à jour (hashé) en BDD
        - sinon, on affiche un message d'erreur à l'utilisateur "lien invalide"

6.  Enfin supprimer le token utilisé de la BDD

-->

<?php
require 'db.php';

$db = ConnexionBase();

// générer un token
$montoken = new DateTime();
var_dump($montoken);

$montoken = $montoken->format("YmdHis") . random_int(0, 999999); // date + un nombre aléatoire assez grand car il doit-être unique
var_dump($montoken);

$montoken = password_hash($montoken, PASSWORD_DEFAULT);  // hash et plus sûre que crypt car il faudra utiliser le methode GET // enr ça en bdd
var_dump($montoken);

$tokencode = urlencode($montoken);
var_dump($tokencode);

// adresse d'eaccés au formulaire de changemnt de password avec un lien crypté vers le comtpe de l'utilisateur
$lien = "http://localhost:3333/afpaDev/projets/record/forgotpassword.php?ytpy=" . $tokencode;
var_dump($lien);

// Vérifier en dbb si c'est la bonne puis donné l'accés si c'est OK
$tokendecode = urldecode($tokencode); // décriper l'url pour vérif en bdd
var_dump($tokendecode);
if (isset($tokendecode))

?>