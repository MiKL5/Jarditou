<?php
include 'personnage.class.php';
// Vérification du fonctionnement de la classe
$p = new personnage();
$p->set_nom("Lebowski");
$p->set_prenom("Jeff");
echo ($p);
?>