<?php
include 'db.php';
include 'fn.php'; // inclu les fonctions

// // Identifiant de session
// session_start(); // pour débuter la session et contient autant de valeur que je veux (âge, etc).

// Déstruction propre de la session
$db =  ConnexionBase();
cleandesctructsession(); // cf fn.php

$login = $_POST["login"];
$password = $_POST["password"];
// var_dump($_POST);
// $login = filter_var($_POST["user_mail"], FILTER_SANITIZE_EMAIL);
// $password = filter_var($_POST["user_password"], FILTER_SANITIZE_ENCODED);
/*user_name, user_firstname,*//* user_name pour affichier pour personnaliser le header */
$connect = $db->prepare("SELECT user_password
                        FROM user
                        WHERE user_mail = :user_mail");
// $connect->bindValue(':user_mail', $login, PDO::PARAM_STR);
// $connect->execute(); // ces 2 lignes font le tableau
$connect->execute(array(":user_mail" => $login));// syntaxe absrégée de bindValue
$result = $connect->fetch(PDO::FETCH_OBJ);
// var_dump($result);
// die;

if ($result !== false) {
    $usr = "user_mail";
    // $usrerror = "";
    $passwd = $result->user_password;
    // $passwd = password_hash("user_password", PASSWORD_DEFAULT);
    // $passwderror = "";
    if (password_verify($password, $passwd)) {
        // Identifiant de session
        session_start(); // pour débuter la session et contient autant de valeur que je veux (âge, etc).
        $_SESSION["login"] = $login; // l'id
        $_SESSION["role"] = "client"; // le rôle parfois admin // à la base c'était visiteur
        echo". session ID : ".session_id(); 
        // // Test de la session, la fonction vient de fn.php
        // testsession();
        
        // // Mot de passe utiliser password_verify() qui reçoit obligatoirement 2 paramètres
        // password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd);
        
        header("Location: disc.php");
        exit;
    }
    else {
        header("Location: index.php?err=pwd");
        exit;
    }
}
else {
    header("Location: index.php?err=user");
    exit;
}

?>