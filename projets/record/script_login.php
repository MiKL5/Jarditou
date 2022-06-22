<?php
include 'db.php';
include 'fn.php'; // inclu les fonctions
// Si le login et le mot de passe sont corrects (pour exemple login='admin' et mot de passe='admin') alors nous initialisons une variable de session auth avec la valeur ok.
// Sinon la variable de session auth est détruite.

// // Identifiant de session
// session_start(); // pour débuter la session et contient autant de valeur que je veux (âge, etc).

// Déstruction propre de la session
$db =  ConnexionBase();
cleandesctructsession(); // cf fn.php

$login = $_POST["login"];
$password = $_POST["password"];
var_dump($_POST);
// $login = filter_var($_POST["user_mail"], FILTER_SANITIZE_EMAIL);
// $password = filter_var($_POST["user_password"], FILTER_SANITIZE_ENCODED);
$connect = $db->prepare("SELECT user_password
                        WHERE user_mail = :user_mail");
// $connect->bindValue(':user_mail', $login, PDO::PARAM_STR);
// $connect->execute(); // ces 2 lignes font le tableau
$connect->execute(array(":user_mail" => $login));// syntaxe absrégée de bindValue
$result = $connect->fetchAll(PDO::FETCH_OBJ);
// var_dump($login);
// die;
if ($result == $login) {
$usr = "user_mail";
// $usrerror = "";
$passwd = password_hash("user_password", PASSWORD_DEFAULT);
// $passwderror = "";
}
if ($resilt == $usr && password_verify($password, $passwd)) {
    
// Une autre page PHP devra être accessible uniquement si une session a été initialisée, c'est-à-dire si l'utilisateur s'est authentifié correctement (donc i la variable de session auth existe et contient la valeur ok). Si ce n'est pas le cas, l'utilisateur devra être redirigé sur la page de connexion.

    // Identifiant de session
    session_start(); // pour débuter la session et contient autant de valeur que je veux (âge, etc).

    $_SESSION["login"] = $result; // l'id
    $_SESSION["role"] = "visiteur"; // le rôle pas toujours admin
    echo". session ID : ".session_id(); 

    // // Test de la session, la fonction vient de fn.php
    // testsession();

    // // Mot de passe utiliser password_verify() qui reçoit obligatoirement 2 paramètres
    // password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd);
    

    header("Location: disc.php");
    exit;
}

else {
// AUTORISER register.php
//     var_dump($login);
//     var_dump($usr);
//     die;
    if ($result != $usr) {
        header("Location: index.php?err=user");
        exit;
    }
    elseif (!password_verify($password, $passwd)) {
        header("Location: index.php?err=pwd");
        exit;
    }
}

?>