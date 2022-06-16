<?php
    include 'db.php';
    include 'fn.php'; // inclu les fonctions
// Si le login et le mot de passe sont corrects (pour exemple login='admin' et mot de passe='admin') alors nous initialisons une variable de session auth avec la valeur ok.
// Sinon la variable de session auth est détruite.

$usr = "";
$usrerror = "";
$passwd = "";
$passwderror = "";
// Une autre page PHP devra être accessible uniquement si une session a été initialisée, c'est-à-dire si l'utilisateur s'est authentifié correctement (donc i la variable de session auth existe et contient la valeur ok). Si ce n'est pas le cas, l'utilisateur devra être redirigé sur la page de connexion.
    // Identifiant de session
    session_start(); // pour débuter la session et contient autant de valeur que je veux (âge, etc).
    $_SESSION["login"] = "$user"; // l'id
    $_SESSION["role"] = "admin"; // le rôle pas toujours admin
    echo"- session ID : ".session_id(); 

    // Test de la session
    testsession();

    // Mot de passe utiliser password_verify() qui reçoit obligatoirement 2 paramètres
    password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd);





    // Déstruction propre de la session
    cleandesctructsession(); // cf fn.php

// Mail de confirmation d'inscription
$aHeaders = array('MIME-Version' => '1.0',
                  'Content-Type' => 'text/html; charset=utf-8',
                  'From' => 'Dave Loper <dave.loper@afpa.fr>',
                  'Reply-To' => 'Velvet Record <noreply@velvet_record.com>',
                  'X-Mailer' => 'PHP/' . phpversion()
                  );
// puis le body

// essayer peut-être un exemple avec Boutstrap
?>